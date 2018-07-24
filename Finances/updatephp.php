<?php

include_once "dbconn/variables.php";

 $db = mysqli_connect($server,$user,$pass,$table)
  or die('Error connecting to MySQL server.');
////////////////////////////////////////////////////////////////////////////////////////////////////
/////REGISTER FUNCTIONS//////////////////
// Begin Update record 
if (isset($_POST['update'])) {
     $Id = $_POST['Id'];
     //$Account = $_POST['Account'];
     $TDate = $_POST['TDate'];
     $PDate = $_POST['PDate'];
     $CkNo = $_POST['CkNo'];
     $Description = $_POST['Description'];
     $Debit = $_POST['Debit'];
     $Credit = $_POST['Credit'];
     $Category = $_POST['Category'];
     $RecurId = $_POST['RecurId'];

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
     echo $query;
     
}
// End Update record 

// Begin delete record
if (isset($_POST['delete'])) {
    $Id = $_POST['Id'];
    $CopyQuery = "INSERT INTO Trash select * from Register where Id = '$Id'";
    $DelQuery = "DELETE FROM Register WHERE Id ='$Id'";
    echo $query;
//DELETE FROM MyGuests WHERE id=3
    mysqli_query($db, $CopyQuery);
    mysqli_query($db, $DelQuery);
    /* if (mysqli_query($db, $CopyQuery)) {
        echo "Record updated successfully";
    } 
    else {
        echo "Error updating record: " . mysqli_error($db);
    } */
    //INSERT INTO persons_table select * from customer_table where person_name = 'tom';
    //DELETE FROM customer_table where person_name = 'tom';
}
// End delete record

// Begin restore record
if (isset($_POST['restoreRecs'])) {
    $arestore = $_POST['restore'];
    if(empty($arestore))
    {
      echo("You didn't select any records.");
    }
    else
    {
      $N = count($arestore);
      echo("You selected $N record(s) to restore: ");
      for($i=0; $i < $N; $i++)
      {
        echo htmlspecialchars($arestore[$i] ). " ";
        $CopyQuery = "INSERT INTO Register select * from Trash where Id = '$arestore[$i]'";
        $DelQuery = "DELETE FROM Trash WHERE Id ='$arestore[$i]'";
        if (mysqli_query($db, $CopyQuery)) {
            echo "Record ' . $arestore[$i] . ' copied successfully from Trash to Register";
        }
        if (mysqli_query($db, $DelQuery)) {
            echo "Record ' . $arestore[$i] . ' removed successfully from Trash ";
        }
    /* if (mysqli_query($db, $CopyQuery)) {
        echo "Record updated successfully";
    } 
    else {
        echo "Error updating record: " . mysqli_error($db);
    } */
      }
    }
}
// End restore record

// Begin Empty Trash
if (isset($_POST['removeAll'])) {
    $EmptyTrashQuery = "TRUNCATE TABLE Trash";
    mysqli_query($db, $EmptyTrashQuery);
}
// End Empty Trash


// Begin Add record
if (isset($_POST['add'])) {
     //$Id = $_POST['Id'];
     //$Account = $_POST['Account'];
     $TDate = $_POST['TDate'];
     $PDate = $_POST['PDate'];
     $CkNo = $_POST['CkNo'];
     $Description = $_POST['Description'];
     $Debit = $_POST['Debit'];
     $Credit = $_POST['Credit'];
     $Category = $_POST['Category'];

     if ($_POST['Credit'] == NULL){
          $query = "INSERT INTO Register (Account, TDate, PDate, CkNo, tD, Debit, Credit, Category)
VALUES ('Damien\'s Checking * 7128', '$TDate', '$PDate', '$CkNo', '$Description', '$Debit', NULL, '$Category')";
          //$query = "UPDATE Register SET TDate='$TDate', PDate='$PDate', CkNo='$CkNo', tD='$Description', Debit='$Debit', Credit=NULL where Id ='$Id'";
     }
     else if ($_POST['Debit'] == NULL){
          $query = "INSERT INTO Register (Account, TDate, PDate, CkNo, tD, Debit, Credit, Category)
VALUES ('Damien\'s Checking * 7128', '$TDate', '$PDate', '$CkNo', '$Description', NULL, '$Credit', '$Category')";
          //$query = "UPDATE Register SET TDate='$TDate', PDate='$PDate', CkNo='$CkNo', tD='$Description', Debit=NULL, Credit='$Credit' where Id ='$Id'";
     }
     else {
        $query = "INSERT INTO Register (Account, TDate, PDate, CkNo, tD, Debit, Credit, Category)
        VALUES ('Damien\'s Checking * 7128', '$TDate', '$PDate', '$CkNo', '$Description', '$Debit', '$Credit', '$Category')";
     }
     //$query = "UPDATE Register SET Account='" . $Account . "', TDate='" . $TDate ."', PDate='" . $PDate . "', CkNo='" . $CkNo . "', tD='" . $Description . "', Debit='" . $Debit . "', Credit='" . $Credit . "' where Id ='" . $Id . "'";
     if (mysqli_query($db, $query)) {
         echo "Record added successfully";
     } else {
         echo "Error adding record: " . mysqli_error($db);
     }
}
// End Add record



//Begin upload file
if (isset($_POST['upload'])) {
//$fileName = $_POST['filename'];
$fileName = $_FILES['filename']['tmp_name'];
//move_uploaded_file($fileName, $fileName);
//echo $fileName . "</br>";
$query = <<<eof
 LOAD DATA LOCAL INFILE '$fileName' INTO TABLE Register 
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 IGNORE 1 LINES
 (Account,TDate,PDate,CkNo,tD,Debit,Credit)
eof;
echo $query . "</br>";

if (mysqli_query($db, $query)) {
         echo "File uploaded successfully";
     } else {
         echo "Error uploading file: " . mysqli_error($db);
     }

}
//End upload file

//var_dump($_FILES);

////////////////////////////////////////////////////////////////////////////////////////////////////
/////CATEGORY FUNCTIONS//////////////////

// Begin CatUpdate record 
if (isset($_POST['CatUpdate'])) {
    $Id = $_POST['Id'];
    $ParentCategory = $_POST['ParentCategory'];
    $Category = $_POST['Category'];
    $Type = $_POST['Type'];
      $query = "UPDATE Categories SET ParentCategory='$ParentCategory', Category='$Category', Type='$Type' WHERE Id ='$Id'";
      if (mysqli_query($db, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}
// End CatUpdate record 

// Begin Catdelete record
if (isset($_POST['CatDelete'])) {
   $Id = $_POST['Id'];
   $query = "DELETE FROM Categories WHERE Id ='$Id'";
   echo $query;
   if (mysqli_query($db, $query)) {
       echo "Record updated successfully";
   } 
   else {
       echo "Error updating record: " . mysqli_error($db);
   }
}
// End Catdelete record

// Begin CatAdd record
if (isset($_POST['CatAdd'])) {
    //$Id = $_POST['Id'];
    $ParentCategory = $_POST['ParentCategory'];
    $Category = $_POST['Category'];
    $Type = $_POST['Type'];
       $query = "INSERT INTO Categories (ParentCategory, Category, Type)
       VALUES ('$ParentCategory', '$Category', '$Type')";
    
    if (mysqli_query($db, $query)) {
        echo "Record added successfully";
    } else {
        echo "Error adding record: " . mysqli_error($db);
    }
}
// End CatAdd record



//Begin upload Categories file
if (isset($_POST['uploadCat'])) {
    //$fileName = $_POST['filename'];
    $fileName = $_FILES['filename']['tmp_name'];
    //move_uploaded_file($fileName, $fileName);
    //echo $fileName . "</br>";
    $query = <<<eof
     LOAD DATA LOCAL INFILE '$fileName' INTO TABLE Categories 
     FIELDS TERMINATED BY '\t'
     LINES TERMINATED BY '\r\n'
     IGNORE 1 LINES
     (Category,ParentCategory,Used,Type,Description,CatGroup,Tax_Line_Item,Hide)
eof;
    echo $query . "</br>";
    
    if (mysqli_query($db, $query)) {
             echo "File uploaded successfully";
         } else {
             echo "Error uploading file: " . mysqli_error($db);
         }
    
    }
//upload Categories file




//////////RETURN TO REFERRING PAGE////////////////

if(isset($_SERVER["HTTP_REFERER"])){
   header("Location: {$_SERVER["HTTP_REFERER"]}");
}
?>



<!--//////////////TO BE DELETED/////////////////////
<html>
<body>
<br>
Submitted Data:<br>

<?php //echo $_POST['Id']; ?><br>
<?php //echo $_POST['Account']; ?><br>
<?php //echo $_POST['TDate']; ?><br>
<?php //echo $_POST['PDate']; ?><br>
<?php //echo $_POST['CkNo']; ?><br>
<?php //echo $_POST['Description']; ?><br>
<?php //echo $_POST['Debit']; ?><br>
<?php //echo $_POST['Credit']; ?><br>

</body>
</html> -->


