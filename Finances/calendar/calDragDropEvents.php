<?php

include_once "../Finances/dbconn/variables.php";

 $db = mysqli_connect($server,$user,$pass,$table)
  or die('Error connecting to MySQL server.');
////////////////////////////////////////////////////////////////////////////////////////////////////
/////REGISTER FUNCTIONS//////////////////
// Begin Update record 

     $Id = $_POST['Id'];
     //$Account = $_POST['Account'];
     $TDate = $_POST['TDate'];
     $PDate = $_POST['PDate'];
     $query = "UPDATE Register SET TDate='$TDate', PDate='$PDate' WHERE Id ='$Id'";
     
     if (mysqli_query($db, $query)) {
         echo "Record updated successfully";
     } else {
         echo "Error updating record: " . mysqli_error($db);
     }
echo $query;
// End Update record 
?>