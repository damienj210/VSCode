<!-- <?php

/* Values received via ajax */
/* $id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end']; */

// connection to the database
/* try {
 $bdd = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', 'root');
 } catch(Exception $e) {
exit('Unable to connect to database.'); */
}
 // update the records
/* $sql = "UPDATE evenement SET title=?, start=?, end=? WHERE id=?";
$q = $bdd->prepare($sql);
$q->execute(array($title,$start,$end,$id)); */
?> -->


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
     $CkNo = $_POST['CkNo'];
     $Description = $_POST['Description'];
     $Debit = $_POST['Debit'];
     $Credit = $_POST['Credit'];
     $Category = $_POST['Category'];

     if ($_POST['Credit'] == NULL){
          $query = "UPDATE Register SET TDate='$TDate', PDate='$PDate', CkNo='$CkNo', tD='$Description', Debit='$Debit', Credit=NULL, Category='$Category' WHERE Id ='$Id'";
     }
     else if ($_POST['Debit'] == NULL){
          $query = "UPDATE Register SET TDate='$TDate', PDate='$PDate', CkNo='$CkNo', tD='$Description', Debit=NULL, Credit='$Credit', Category='$Category' WHERE Id ='$Id'";
     }
     else {
          $query = "UPDATE Register SET TDate='$TDate', PDate='$PDate', CkNo='$CkNo', tD='$Description', Debit='$Debit', Credit='$Credit', Category='$Category' WHERE Id ='$Id'";
     }
     if (mysqli_query($db, $query)) {
         echo "Record updated successfully";
     } else {
         echo "Error updating record: " . mysqli_error($db);
     }

// End Update record 