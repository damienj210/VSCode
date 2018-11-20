<?php

include_once "dbconn/variables.php";

//Step1
 $db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checking Calendar</title>
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
  

<!--   <script>




</script> -->
<style>
  #calendar {
    max-width: 100%;
    margin: 0 auto;
  }

</style>
  
</head>
<body>



<!-- NAV BAR ---------------------------------------------------------------------------------------------------------------------------------- -->
<?php include_once "navbar.php" ?>

<!-- Modals -->
<?php include_once "modalEdit.php"?>
<?php include_once "modalAdd.php"?>
     
<!-- End Modals -->

<!-- Calendar   ---------------------------------------------------------------------------------------------------------------------------------- -->
<p>
<div class="container">
<div id="calendar">
<a href="https://fullcalendar.io/docs" target="_blank" >documentation</a>
<!-- End Calendar   ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
</div>
<!-- Buttons -->
<div style="visibility:hidden">
<button type="button" class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modalEdit">Edit</button>'
<button type="button" class="btn btn-success btn-sm" id="btnAdd" data-toggle="modal" data-target="#modalAdd">Add</button>
</div>
<!-- End Buttons -->

</body>
</html>
