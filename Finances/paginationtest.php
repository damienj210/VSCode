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
 
 $query = "SELECT COUNT(*) AS cntrows FROM Register";
          $result = mysqli_query($db,$query);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];

            //echo 'Total Records = ' . $allcount;
    

 $query = "SELECT * FROM Register ORDER BY Id DESC LIMIT 0,10";
 $result = mysqli_query($db, $query) or die('Error querying database.');
 
 ?>

<form action=""> 
  <select name="recsPerPage" id="recsPerPage" onchange="grabValues2()" class="form-control">
  <option value="10">Record Per Page:</option>
  <option value="10">10</option>
  <option value="25">25</option>
  <option value="50">50</option>
  <option value="100">100</option>
  </select>
</form>
<p></p>
<p></p>
<div id="txtHint">

<ul class="pagination pagination-sm">
<!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
<?php
$counts = $allcount / 10;
for ($i=0;$i<=$counts;$i++){
  $current = ($i + 1);
  if ($current==1){
    echo '<li class="page-item active"><button class="page-link" value="'. ($i + 1) .'" onclick="grabValues(this.value)">'. ($i + 1) .'</button></li>';
  }
  else {
    echo '<li class="page-item"><button class="page-link" value="'. ($i + 1) .'" onclick="grabValues(this.value)">'. ($i + 1) .'</button></li>';
  }

};
?>
 <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
</ul>



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
 <?php
 
 
 while ($row = mysqli_fetch_array($result)) {
   echo '<tr class="divbutton">';
   echo '<td>' . $row["Id"] . '</td>';
   echo '<td>' . $row["TDate"] . '</td>';
   echo '<td>' . $row["CkNo"] . '</td>';
   echo '<td>' . $row["tD"] . '</td>';
   echo '<td>' . $row["Category"] . '</td>';
  if ($row["Debit"] == "0.00") {
    echo '<td class="text-danger"></td>';
  }
  else {
   echo '<td class="text-danger">' . $row["Debit"] . '</td>';
  }
   if ($row["Credit"] == "0.00") {
   echo '<td></td>';
  }
  else {
   echo '<td>' . $row["Credit"] . '</td>';
  }
   echo '<td></td>';
   echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $row["Id"] . '" data-toggle="modal" data-target="#modalEdit' . $row["Id"] . '">Edit</button>';
   echo '</tr>';
 
 }
 mysqli_close($db);
   ?>
 
 </tbody></table>
 </div>



<script>
function grabValues(str){
  $page = str;
  $count = <?php echo $allcount;?>;
  $option = document.getElementById("recsPerPage").value;
  showCategories($option,$page,$count);
}
function grabValues2(){
  $page = "1";
  $count = <?php echo $allcount;?>;
  $option = document.getElementById("recsPerPage").value;
  showCategories($option,$page,$count);
}
function showCategories(option,page,count) {
    $option = option;
    $page = page;
    $count = count;
    console.log($option, $page, $count);
  var xhttp;    
  if (option == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getrecords.php?q=" + $page + "&r=" + $option + "&a=" + $count, true);
  console.log("getrecords.php?q=" + $page + "&r=" + $option + "&a=" + $count);
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
