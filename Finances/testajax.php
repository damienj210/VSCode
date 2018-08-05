

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checking Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href='https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css' rel='stylesheet' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- <script src='../Finances/js/jquery.js'></script> -->
  <!-- <script src="../Finances/js/mystuff.js"></script>
   -->

  
</head>
<body>
<p>Hi world </p>
<p></p>
<p></p>
<div class="container jumbotron">

<h2>The XMLHttpRequest Object</h2>

<?php
include_once "dbconn/variables.php";
$db = mysqli_connect($server,$user,$pass,$table) or die('Error connecting to MySQL server.');
   $CatQuery = "SELECT * FROM Categories";
   $CatResult = mysqli_query($db, $CatQuery) or die('Error querying database.');
?>

<form action=""> 
<select name="categories" onchange="showCategories(this.value)">
<option value="">Select a category:</option>


<?php
while ($Catrow = mysqli_fetch_array($CatResult)) {
    echo '<option value="' . $Catrow["Id"] . '">' . $Catrow["Category"] . '</option>';
}
?>

</select>
</form>
<br>
<div id="txtHint">Category info will be listed here...</div>

<script>
function showCategories(str) {
    $option = str;
    console.log($option);
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getcategories.php?q="+str, true);
  xhttp.send();
}
</script>
</div>

<div class="container jumbotron">
<h2>The XMLHttpRequest Object AutoFill</h2>

<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<p><b>Start typing a name in the input field below:</b></p>
<form>
Description: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint2"></span></p>
 

</div>





</body>
</html>

