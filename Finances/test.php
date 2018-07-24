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
<p></p>
<p></p>
<p></p>
<div class="container">
<?php

/* $query = "SELECT * FROM Register ORDER BY Id ASC";
$result = mysqli_query($db, $query) or die('Error querying database.'); */


echo '<label for="tDate" class="col-sm-4 col-form-label">Transaction Date:</label>';
echo '<div class="col-sm-8">';
echo '<input type="text" class="form-control test" name="TDate" id="tDate" value="">';
echo '</div>';
echo '<label for="pDate" class="col-sm-4 col-form-label">Posted Date:</label>';
echo '<div class="col-sm-8">';
echo '<input type="text" class="form-control" name="PDate" id="pDate" value="">';
echo '</div>';

?>
<div class="changeme" id="changeme"> The date is :</div
 

</div>


<script> 
$(document).ready(function() {
    $(".test").mouseover(function(){
        $tdate = new Date($(this).val());
		//$pdate = Date.parse($("#pDate").val());
		//$nowDate = Date.parse(new Date());
	    $m = $tdate.getMonth();
		$d = $tdate.getDay()+1;
		$y = $tdate.getFullYear();
		$Ddate = Date.parse(new Date($y,$m,$d)); 

		$q = new Date();
		$m = $q.getMonth();
		$d = $q.getDay();
		$y = $q.getFullYear();
 
		$date = Date.parse(new Date($y,$m,$d));





		//alert($tdate + " - " + $pdate);
		if ($Ddate > $date){
			$("#changeme").html("The date " + $Ddate + " comes after today" + $date + "!");
			//alert("The first date comes after the second!");
		}
		else if ($Ddate == $date){
			$("#changeme").html("The date is today " + $date + " !");
			//alert("The dates are the same!");
		}
		else {
			$("#changeme").html("The date " + $Ddate + " is in the past " + $date + " !");
			//alert("The first date comes before the second!");
		}

		});
    });
//});
</script>


</body>
</html>




