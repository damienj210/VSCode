<?php
include_once "dbconn/variables.php";
$db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');

//q is the Id of the record to edit;
 $q = intval($_GET['q']);

 $query = "SELECT * FROM Register WHERE Id = " . $q;
 $result = mysqli_query($db, $query) or die('Error querying database.');

 while ($row = mysqli_fetch_array($result)) {
   $id = $row['Id'];
   $account = $row['Account'];
   $tDate = $row['TDate'];
   $pDate = $row['PDate'];
   $ckno = $row['CkNo'];
   $Desc = $row['tD'];
   $Debit = $row['Debit'];
   $Credit = $row['Credit'];
   $Category = $row['Category'];
  };

?>
                <?php  
                  /* $Catquery = "SELECT * FROM Categories";
                  $CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
                  while ($CatRow = mysqli_fetch_array($CatResult)) {
                    if ($CatRow["Category"] == $row["Category"]){
                      echo '<option value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
                    }
                    else {
                      echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                    }
                  }; */
                  ?> 
 <?php
 mysqli_close($db);
 ?>
<script>
$id = <?php echo $id; ?>;
$account = <?php echo $account; ?>;
$tDate = <?php echo $tDate; ?>;
$pDate = <?php echo $pDate; ?>;
$ckno = <?php echo $ckno; ?>;
$Desc = <?php echo $Desc; ?>;
$Debit = <?php echo $Debit; ?>;
$Credit = <?php echo $Credit; ?>;
$Category = <?php echo $Category; ?>;

          document.getElementById("recordID").value = $id;
          document.getElementById("Account").value = $account;
          document.getElementById("tDate").value = $tDate;
          document.getElementById("pDate").value = $pDate;
          document.getElementById("CkNo").value = $ckno;
          document.getElementById("Desc").value = $Desc;
          document.getElementById("Debit").value = $Debit;
          document.getElementById("Credit").value = $Credit;
          document.getElementById("Category").value = $Category;
</script>

