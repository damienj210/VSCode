<?php
include_once "dbconn/variables.php";
$db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');

//q is the page number;
 $q = intval($_GET['q']);
 //r is the rows per page;
 $r = intval($_GET['r']);
 //a is the total records in the database;
 $a = intval($_GET['a']);
 //$b = intval($_GET['b']);

 $records = ($q - 1) * $r;
 $query = "SELECT * FROM Register ORDER BY Id DESC LIMIT ". $records ."," . $r ;
 $result = mysqli_query($db, $query) or die('Error querying database.');
 $totalPages = intval(($a / $r) + 1);
 ?>
  

<!-- <ul class="pagination pagination-sm"> -->
<!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
<?php
//$counts = $a / $r;

  /* for ($i=0;$i<=$counts;$i++){
      $current = ($i + 1);
      if ($current==$q){
        echo '<li class="page-item active"><button class="page-link" value="'. ($i + 1) .'" onclick="grabValues(this.value)">'. ($i + 1) .'</button></li>';
    }
      else {
        echo '<li class="page-item"><button class="page-link" value="'. ($i + 1) .'" onclick="grabValues(this.value)">'. ($i + 1) .'</button></li>';
      }
    
  }; */
?>
 <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->

<!-- </ul> -->
<!-- ////////////////////PAGINATION///////////////////////////////////////////// -->
<div class="form-inline" style="float:right">
<input type="image" name="btnTopFirst" id="btnTopFirst" src="images/pg-first.gif" style="border-width:0px;" onclick="grabValues(this.value)" value="1">
    &nbsp;<input type="image" name="btnTopPrevious" id="btnTopPrevious" src="images/pg-prev.gif" style="border-width:0px;" onclick="grabValues(this.value)" value="
    <?php 
        if ($q <= 1){
          $back = $q;
        }
        else {
          $back = $q - 1;
        };
        echo $back;
        ?>
    ">
    &nbsp;Page&nbsp;
    <input name="txtTopGoTo" class="form-control-sm" type="text" value="<?php echo $q;?>" id="txtTopGoTo" class="muted-newtext" onchange="this.value = minmax(this.value, 1, <?php echo $totalPages;?>);grabValues(this.value)" style="width:50px;">
    &nbsp;of&nbsp;
    <?php echo $totalPages;?>&nbsp;
    <input type="image" name="btnTopNext" id="btnTopNext" src="images/pg-next.gif?61" style="border-width:0px;" onclick="grabValues(this.value)" value="
    <?php 
        if ($q >= $totalPages){
          $next = $q;
        }
        else {
          $next = $q + 1;
        };
        echo $next;
    ?>
    ">
    &nbsp;<input type="image" name="btnTopLast" id="btnTopLast" src="images/pg-last.gif?61" style="border-width:0px;" onclick="grabValues(this.value)" value="<?php echo $totalPages;?>">
  </div>
      </br></br>
  <!-- ////////////////////END PAGINATION///////////////////////////////////////////// -->
  

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
 <th></th>
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
   echo '<td>' . $row["Balance"] . '</td>';
   echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $row["Id"] . '" data-toggle="modal" data-target="#modalEdit" value="' . $row["Id"] . '" onclick="populateModalEdit(this.value)">Edit</button>';
   echo '</tr>';
 
 }
 mysqli_close($db);
   ?>
 
 </tbody></table>
 <!-- <p></p> -->

<div class="form-inline" style="float:right">
<input type="image" name="btnTopFirst" id="btnTopFirst" src="images/pg-first.gif" style="border-width:0px;" onclick="grabValues(this.value)" value="1">
    &nbsp;<input type="image" name="btnTopPrevious" id="btnTopPrevious" src="images/pg-prev.gif" style="border-width:0px;" onclick="grabValues(this.value)" value="
    <?php 
        if ($q <= 1){
          $back = $q;
        }
        else {
          $back = $q - 1;
        };
        echo $back;
        ?>
    ">
    &nbsp;Page&nbsp;
    <input name="txtTopGoTo" class="form-control-sm" type="text" value="<?php echo $q;?>" id="txtTopGoTo" class="muted-newtext" onchange="this.value = minmax(this.value, 1, <?php echo $totalPages;?>);grabValues(this.value)" style="width:50px;">
    &nbsp;of&nbsp;
    <?php echo $totalPages;?>&nbsp;
    <input type="image" name="btnTopNext" id="btnTopNext" src="images/pg-next.gif?61" style="border-width:0px;" onclick="grabValues(this.value)" value="
    <?php 
        if ($q >= $totalPages){
          $next = $q;
        }
        else {
          $next = $q + 1;
        };
        echo $next;
    ?>
    ">
    &nbsp;<input type="image" name="btnTopLast" id="btnTopLast" src="images/pg-last.gif?61" style="border-width:0px;" onclick="grabValues(this.value)" value="<?php echo $totalPages;?>">
  </div>


 <!-- <ul class="pagination pagination-sm"> -->
<!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
<?php
/* $counts = $a / $r;
  for ($i=0;$i<=$counts;$i++){
      $current = ($i + 1);
      if ($current==$q){
        echo '<li class="page-item active"><button class="page-link" value="'. ($i + 1) .'" onclick="grabValues(this.value)">'. ($i + 1) .'</button></li>';
    }
      else {
        echo '<li class="page-item"><button class="page-link" value="'. ($i + 1) .'" onclick="grabValues(this.value)">'. ($i + 1) .'</button></li>';
      }
    
  }; */
?>
 <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
<!-- </ul> -->

     