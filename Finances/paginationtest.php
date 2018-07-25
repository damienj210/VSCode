<?php
include_once "dbconn/variables.php";
$db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checking Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href='../Finances/css/fullcalendar.css' rel='stylesheet'/>
  <link href='../Finances/css/fullcalendar.print.css' rel='stylesheet' media='print'/>
  <link href='https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css' rel='stylesheet' />
  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
  <link type="text/css" rel="stylesheet" href="../Finances/css/jquery.qtip.css" />
  <link href='../Finances/css/mystuff.css' rel='stylesheet'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src='../Finances/js/moment.js'></script>
  <script src='../Finances/js/jquery.js'></script>
  <script src='../Finances/js/fullcalendar.js'></script>
  <script src="../Finances/js/jquery.qtip.js"></script>
  <script src="../Finances/js/popover.js"></script>
  <script src="../Finances/js/mystuff.js"></script>
  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
   <!-- SimplePagination Plugin -->
   <script type="text/javascript" src="./js/simplepagination.js"></script>
  <link rel="stylesheet" href="./css/simplepagination.css"/>
  

  
</head>
<body>



<!-- Register  ---------------------------------------------------------------------------------------------------------------------------------- -->
<div class="container">
<div class="collapse show" id="register" aria-labelledby="headingOne" data-parent="#accordion">

<?php
 
$query = "SELECT * FROM Register ORDER BY Id ASC";
$result = mysqli_query($db, $query) or die('Error querying database.');

?>

<table class="table table-striped table-hover table-responsive-sm">
<thead>
<tr>
<th>ID#</th>
<th>Transaction Date</th>
<th>Check No</th>
<th>Description</th>
<th>Category</th>
<th>Debit</th>
<th>Deposit</th>
<th>Balance</th>
</tr>
</thead>
<tbody>

<form action=""> 
<select name="categories" onchange="showCategories(this.value)">
<option value="">Select a category:</option>
</select>
</form>

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
  xhttp.open("GET", "getrecords.php?q="+str, true);
  xhttp.send();
}
</script>
</div>

</tbody></table>





<!-- End Register  ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
</div>
</div>
</body>
</html>
