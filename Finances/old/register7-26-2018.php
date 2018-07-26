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


<!-- NAV BAR ------------------------------------------------------------------ -->

<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark left"><nav class="nav flex-column bg-dark navbar-dark">-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top d-flex flex-row" style="margin:0 width:100%">
<ul class="navbar-nav d-flex mr-auto">
  <a class="navbar-brand" href="../index.php">
  	<img src="../images/Damien.png" alt="Damien" style="width:40px;">
</a>

  <li class="nav-item">
      <a href="register.php" class="nav-link btn btn-link">Register</a>
      <!--<button class="nav-link btn btn-link" id="registerBtn" data-toggle="collapse" data-target="#register" aria-expanded="true" aria-controls="register">Register</a>-->
    </li>
    <li class="nav-item">
      <a href="categories.php" class="nav-link btn btn-link">Categories</a>
      <!--<button class="nav-link btn btn-link" id="categoriesBtn" data-toggle="collapse" data-target="#categories" aria-expanded="true" aria-controls="categories">Categories</a>-->
    </li>
    <li class="nav-item">
      <a href="calendar.php" class="nav-link btn btn-link">Calendar</a>
      <!--<button class="nav-link btn btn-link" id="calendarBtn" data-toggle="collapse" data-target="#calendar" aria-expanded="false" aria-controls="calendar">Calendar</a>-->
    </li>
    <li class="nav-item">
      <a href="reports.php" class="nav-link btn btn-link">Reports</a>
      <!--<button class="nav-link btn btn-link" id="reportsBtn" data-toggle="collapse" data-target="#reports" aria-expanded="false" aria-controls="reports">Reports</a>-->
    </li>
    
    
  </ul>
  <div class="d-flex mr-auto">
  <button type="button" class="btn btn-success" style="display: block; margin: 0 auto;">
            <?php
            $query = "SELECT SUM(Debit) AS debit, SUM(Credit) AS credit FROM Register";
            //$query = "SELECT SUM(Debit + Credit) FROM Register";
            //mysqli_query($db, $query) or die('Error querying database.');
            $result = mysqli_query($db, $query)  or die('Error querying database.');
            while ($row = mysqli_fetch_array($result)) {
            $Balance = $row["credit"] + $row["debit"];
            echo 'Checking Balance: ' . $Balance;
            }
            ?></button></div>
    <div class="d-flex ml-auto">
  <!--<div class="ml-auto navbutton"> -->
    <!-- <button type="button" class="btn btn-success btn-sm" id="btnUploadCat" data-toggle="modal" data-target="#modalUploadCat">UploadCategories</button> -->
    <?php $query = "SELECT COUNT(*) AS cntrows FROM Trash";
          $result = mysqli_query($db,$query);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];
    ?>
    <button type="button" class="btn btn-success btn-sm" id="btnUpload" data-toggle="modal" data-target="#modalUpload">Upload</button>&nbsp;
    <button type="button" class="btn btn-success btn-sm" id="btnAdd" data-toggle="modal" data-target="#modalAdd">Add</button>&nbsp;
    <button type="button" class="btn btn-success btn-sm" id="btnTrash" data-toggle="modal" data-target="#modalTrash">Trash <span class="badge badge-light"><?php echo $allcount; ?></span></button>
    

  </div>
  
</nav>

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
<?php


$DebitTot = 0;
$CreditTot = 0;
$resultsArray = [];
   while ($row = mysqli_fetch_assoc($result)){
   $DebitTot += $row['Debit'];
   $CreditTot += $row['Credit'];
   $RunTot = round($CreditTot + $DebitTot, 2);
   array_push($resultsArray, array($row['Id'], $row['Account'], $row['TDate'], $row['PDate'], $row['CkNo'], $row['tD'], $row['Category'], $row['Debit'], $row['Credit'], $RunTot));
 }
 $reverse=array_reverse($resultsArray);
 $reverse_length = count($reverse);
 for ($x = 0; $x < $reverse_length; $x++)
 {       
    echo '<tr class="divbutton">';
    for ($i = 0; $i < 10; $i++)
    {
      if ($i == 7)
      {
        if ($reverse[$x][$i] == "0.00")
        {
          echo '<td class="text-danger"></td>';
        }
        else 
        {
          echo '<td class="text-danger">' . $reverse[$x][$i] . '</td>';
        }
      }
      else if ($i == 8)
      {
        if ($reverse[$x][$i] == "0.00")
        {
          echo '<td></td>';
              }
        else 
        {
          echo '<td>' . $reverse[$x][$i] . '</td>';
              }

      }
      else if ($i == 1)
      {

      }
      else if ($i == 3)
      {
        
      }
      else 
      {
        echo '<td>' . $reverse[$x][$i] . '</td>';
      }
   }
   echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $reverse[$x][0] . '" data-toggle="modal" data-target="#modalEdit' . $reverse[$x][0] . '">Edit</button>';
   echo '</tr>';

	//<!--modal Edit-->
  echo '<div class="modal fade" id="modalEdit' . $reverse[$x][0] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
  echo '<div class="modal-dialog" role="document">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
      echo '<h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>';
      echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
      echo '<span aria-hidden="true">&times;</span>';
      echo '</button>';
    echo '</div>';
    echo '<div class="modal-body">';
      echo '<form action="updatephp.php" method="post">';
      echo '<div class="form-group row">';
      echo '<label for="recordID' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">RecordID:</label>';
         echo '<div class="col-sm-8">';
      echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID' . $reverse[$x][0] . '" readonly value="' . $reverse[$x][0] . '">';
         echo '</div>';
      echo '<label for="Account' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Account:</label>';
         echo '<div class="col-sm-8">';
      echo $reverse[$x][1];
      //echo '<input type="text" class="form-control-plaintext" name="Account" id="Account' . $row["Id"] . '" readonly value="' . $row["Account"] . '">';
         echo '</div>';
      echo '</div>';
      echo '<div class="form-group row">';
      echo '<label for="tDate' . $reverse[$x][0] . '" class="col-sm-4 col-form-label control-label">Transaction Date:</label>';
         echo '<div class="col-sm-8">';
      echo '<input type="date" class="form-control" name="TDate" id="tDate' . $reverse[$x][0] . '" value="' . $reverse[$x][2] . '">';
         echo '</div>';
      echo '<label for="pDate' . $reverse[$x][0] . '" class="col-sm-4 col-form-label control-label">Posted Date:</label>';
         echo '<div class="col-sm-8">';
      echo '<input type="date" class="form-control" name="PDate" id="pDate' . $reverse[$x][0] . '" value="' . $reverse[$x][3] . '">';
         echo '</div>';
      echo '<label for="CkNo' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Check #:</label>';
         echo '<div class="col-sm-8">';
      echo '<input type="text" class="form-control" name="CkNo" id="CkNo' . $reverse[$x][0] . '" value="' . $reverse[$x][4] . '">';
         echo '</div>';
      echo '<label for="Desc' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Description:</label>';
         echo '<div class="col-sm-8">';
      echo '<input type="text" class="form-control" name="Description" id="Desc' . $reverse[$x][0] . '" value="' . $reverse[$x][5] . '">';
         echo '</div>';
      echo '<label for="Debit' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Debit:</label>';
         echo '<div class="col-sm-8">';
      echo '<input type="text" class="text-danger form-control" name="Debit" id="Debit' . $reverse[$x][0] . '" value="' . $reverse[$x][7] . '">';
         echo '</div>';
      echo '<label for="Credit' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Deposit:</label>';
         echo '<div class="col-sm-8">';
      echo '<input type="text" class="form-control" name="Credit" id="Credit' . $reverse[$x][0] . '" value="' . $reverse[$x][8] . '">';
         echo '</div>';
      echo '<label for="Category' . $reverse[$x][0] . '" class="col-sm-4 col-form-label">Category:</label>';
         echo '<div class="col-sm-8">';
      echo '<select class="form-control" name="Category" id="Category' . $reverse[$x][0] . '" value="' . $reverse[$x][6] . '">';
      $Catquery = "SELECT * FROM Categories";
      $CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
      while ($CatRow = mysqli_fetch_array($CatResult)) {
        if ($CatRow["Category"] == $reverse[$x][6]){
        echo '<option value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
        }
        else {
        echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
        }
      }
      echo '</select>';
         echo '</div>';
      echo '</div>';
    echo '<div class="modal-footer">';
      echo '<button type="submit" class="float-left btn btn-primary" name="update" value="update">Save changes</button>';
      echo '<button type="button" class="float-left btn btn-secondary" data-dismiss="modal">Cancel</button>';
      echo '<button type="submit" class="float-right btn btn-danger" name="delete" value="delete" onclick="form.submit(name=delete)">Delete</button>';

      echo '</div>';
      echo '</form>';
    echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  //<!--end modal Edit-->
}
?>

</tbody></table>

<?php
          
          //<!--modal Upload-->
          echo '<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog" role="document">';
              echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                  echo '<h5 class="modal-title" id="exampleModalLabel">Upload Transactions</h5>';
                  echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                  echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                    echo '<form enctype="multipart/form-data" action="updatephp.php" method="post" >';
                    echo '<label class="btn btn-primary btn-file btn-block d-block"> Browse <input type="file" size="50" id="upload1" name="filename" hidden></label>';
                    echo '<label class="btn btn-secondary btn-block d-block" for="filename">File name to import</label>';
                echo '</div>';
                echo '<div class="modal-footer">';
                  echo '<button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>';
                  echo '<button type="submit" class="btn btn-primary" name="upload" value="upload">Upload</button>';
                echo '</div>';
                    echo '</form>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          //<!--end modal Upload-->

          //<!--modal Add-->
          echo '<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog" role="document">';
              echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                  echo '<h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>';
                  echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                  echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                    echo '<form action="updatephp.php" method="post" >';
                    echo '<div class="form-group row">';
                    //echo '<label for="recordID" class="col-sm-4 col-form-label">RecordID:</label>';
                       //echo '<div class="col-sm-8">';
                    //echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID' . $row["Id"] . '" readonly value="' . $row["Id"] . '">';
                       //echo '</div>';
                    echo '<label for="Account" class="col-sm-4 col-form-label">Account:</label>';
                       echo '<div class="col-sm-8">';
                    echo 'Damien\'s Checking * 7128';
                    //echo '<input type="text" class="form-control-plaintext" name="Account" id="Account' . $row["Id"] . '" readonly value="' . $row["Account"] . '">';
                       echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group row">';
                    echo '<label for="tDate" class="col-sm-4 col-form-label">Transaction Date:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="TDate" id="tDate" value="">';
                       echo '</div>';
                    echo '<label for="pDate" class="col-sm-4 col-form-label">Posted Date:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="PDate" id="pDate" value="">';
                       echo '</div>';
                    echo '<label for="CkNo" class="col-sm-4 col-form-label">Check #:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="CkNo" id="CkNo" value="">';
                       echo '</div>';
                    echo '<label for="Desc" class="col-sm-4 col-form-label">Description:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="Description" id="Desc" value="">';
                       echo '</div>';
                    echo '<label for="Debit" class="col-sm-4 col-form-label">Debit:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="text-danger form-control" name="Debit" id="Debit" value="">';
                       echo '</div>';
                    echo '<label for="Credit" class="col-sm-4 col-form-label">Deposit:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="Credit" id="Credit" value="">';
                       echo '</div>';
                    echo '<label for="Category" class="col-sm-4 col-form-label">Category:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<select class="form-control" name="Category" id="addCategory" value="Category>';
                    $Catquery = "SELECT * FROM Categories";
                    $CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
                    while ($CatRow = mysqli_fetch_array($CatResult)) {
                      if ($CatRow["Category"] == $row["Category"]){
                        echo '<option value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
                      }
                      else {
                        echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                      }
                    }
                    echo '</select>';
                      echo '</div>';
                    echo '</div>';
                echo '<div class="modal-footer">';
                  //echo '<button type="submit" class="btn btn-danger mr-auto" name="delete" value="delete">Delete</button>';
                  echo '<button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>';
                  echo '<button type="submit" class="btn btn-primary" name="add" value="add">Add Transaction</button>';
                echo '</div>';
                    echo '</form>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '</div>';
          //<!--end modal Add-->

          //<!--modal Trash-->
          echo '<div class="modal fade" id="modalTrash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
          echo '<div class="modal-dialog" role="document">';
            echo '<div class="modal-content">';
              echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="exampleModalLabel">Trash Bin</h5>';
                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                  echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
              echo '</div>';
              echo '<div class="modal-body">';
                echo '<form action="updatephp.php" method="post" >';

              ?>
              
                <table class="table table-responsive-sm">
                  <tbody>
          <?php 
              $TrashQuery = "SELECT * FROM Trash";
              $TrashResult = mysqli_query($db, $TrashQuery) or die('Error querying database.');
                      while ($row = mysqli_fetch_array($TrashResult)) {
                        echo '<tr class="divbutton">';
                        echo '<td>' . $row["TDate"] . '</td>';
                        echo '<td>' . $row["CkNo"] . '</td>';
                        echo '<td>' . $row["tD"] . '</td>';
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
                    
                        echo '<td><span class="custom-control custom-checkbox">';
                        echo '<input type="checkbox" class="custom-control-input" id="customCheck' . $row["Id"] . '" name="restore[]" value="' . $row["Id"] . '">';
                        echo '<label class="custom-control-label" for="customCheck' . $row["Id"] . '">';
                        echo '</label>';
                        echo '</span></td>';
                        //echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $row["Id"] . '" data-toggle="modal" data-target="#modalEdit' . $row["Id"] . '">Restore</button>';
                        echo '</tr>';
                      }
                        echo '</tbody>';
                        echo '</table>';
                  //echo 'File name to import:</br>';
                  //echo '<label class="btn btn-primary btn-file btn-block d-block"> Browse <input type="file" size="50" id="upload1" name="filename" hidden></label>';
                  //echo '<label class="btn btn-secondary btn-block d-block" for="filename">File name to import</label>';
              echo '</div>';
              echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>';
                echo '<button type="submit" class="btn btn-primary" name="restoreRecs" value="restoreRecs">Restore</button>';
                echo '<button type="submit" class="btn btn-danger float-left" name="removeAll" value="removeAll" onclick="return confirm(\'Do you really want to Empty the Trash?\r\nThis cannot be undone!\')">Empty Trash</button>';
              echo '</div>';
                  echo '</form>';
            echo '</div>';
          echo '</div>';
          //echo '</div>';
          //<!--end modal Trash-->


?>



<!-- End Register  ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
</div>
</div>
</body>
</html>
