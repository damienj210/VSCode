<?php

include_once "dbconn/variables.php";

//Step1
 $db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rivera Finances</title>
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


<!-- NAV BAR ------------------------------------------------------------------ -->

<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark left"><nav class="nav flex-column bg-dark navbar-dark">-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top d-flex flex-row" style="margin:0 width:100%">
<ul class="navbar-nav d-flex mr-auto">
  <a class="navbar-brand" href="../index.php">
  	<img src="../images/Damien.png" alt="Damien" style="width:40px;">
</a>
  
  <li class="nav-item nav-link">
    <a href="#" class="nav-link btn btn-link">Rivera Finances</a>
  </li>
  </ul>
  <div class="d-flex mr-auto">
    <button type="button" class="btn btn-success" style="display: auto;" onclick="location.href='register.php'">
            <?php
            $query = "SELECT SUM(Debit) AS debit, SUM(Credit) AS credit FROM Register";
            $result = mysqli_query($db, $query)  or die('Error querying database.');
            while ($row = mysqli_fetch_array($result)) {
            $Balance = $row["credit"] + $row["debit"];
            echo 'Checking Balance: ' . $Balance;
            }
            ?></button>
  </div>
  <div class="d-flex mr-auto">
    <button type="button" class="btn btn-success" style="display: auto;">
            <?php
            $query = "SELECT SUM(Debit) AS debit, SUM(Credit) AS credit FROM Register";
            $result = mysqli_query($db, $query)  or die('Error querying database.');
            while ($row = mysqli_fetch_array($result)) {
            $Balance = $row["credit"] + $row["debit"];
            echo 'Savings Balance: ' . $Balance;
            }
            ?></button>
  </div>
  <div class="d-flex ml-auto">
  </div>
</nav>

<!-- Body ------------------------------------------------------------------ -->
</br>
<div class="container">
  <div class="jumbotron">

    <!-- <div> -->
        <h3>Checking</h3>
        <div class="d-flex flex-row">
          <?php include_once "piechartChecking.php";?>
        </div>
    <!-- </div> -->

  
    </br>
    <!-- <div> -->
      <h3>Savings</h3>
      <div class="d-flex mx-auto">
              <?php include_once "piechartSavings.php";?>
      </div>
    <!-- </div> -->
  
  
  </div> 
</div>
<!-- </div> -->
</body>
</html>