<?php

include_once "dbconn/variables.php";

//Step1
 $db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reformed / Confessional Reading Starter Kit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css' rel='stylesheet' />
  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
  <link href='css/mystuff.css' rel='stylesheet' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
  
  

  
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
    <a href="#" class="nav-link btn btn-link">Reformed / Confessional Reading Starter Kit</a>
  </li>
  </ul>
  <div class="d-flex ml-auto">
          <!--<div class="ml-auto navbutton"> -->
          <!-- <button type="button" class="btn btn-success btn-sm" id="btnUploadCat" data-toggle="modal" data-target="#modalUploadCat">UploadCategories</button> -->
          <?php $query = "SELECT COUNT(*) AS cntrows FROM Trash";
                $result = mysqli_query($db,$query);
                  $fetchresult = mysqli_fetch_array($result);
                  $allcount = $fetchresult['cntrows'];
          ?>
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Actions
              </button>
              <!-- <div class="dropdown-menu"> -->
                <ul class="dropdown-menu"><li>
                <button type="button" class="btn btn-success btn-sm dropdown-item" id="btnUpload" data-toggle="modal" data-target="#modalUpload">Upload</button>
                <button type="button" class="btn btn-success btn-sm dropdown-item" id="btnAdd" data-toggle="modal" data-target="#modalAdd">Add</button>
                <button type="button" class="btn btn-success btn-sm dropdown-item" id="btnTrash" data-toggle="modal" data-target="#modalTrash">Trash <span class="badge badge-light"><?php echo $allcount; ?></span></button>
                  </li><li class="divider"></li><li>
                <button type="button" class="btn btn-success btn-sm dropdown-item" name="btnRecalc" id="btnRecalc" value="Recalc" onclick="javascript:window.location.href = 'RecalculateBalances.php';">Recalc</button>
                  </li></ul>
              <!-- </div> --> 
          <!-- <button type="button" class="btn btn-success btn-sm" id="btnUpload" data-toggle="modal" data-target="#modalUpload">Upload</button>&nbsp;
          <button type="button" class="btn btn-success btn-sm" id="btnAdd" data-toggle="modal" data-target="#modalAdd">Add</button>&nbsp;
          <button type="button" class="btn btn-success btn-sm" id="btnTrash" data-toggle="modal" data-target="#modalTrash">Trash <span class="badge badge-light"><?php //echo $allcount; ?></span></button> -->
          

        </div>
  
</nav>

<!-- Body ------------------------------------------------------------------ -->
</br>
<?php
$query = "SELECT * FROM `StarterKit`";
$result = mysqli_query($db, $query) or die('Error querying database.');
?>

<table id="myTable" class="table table-striped table-hover table-responsive-sm tablesorter">

<!--  <table id="myTable" class="tablesorter">
 --> <thead>
 <tr>
 <th>ID#</th>
 <th>Title</th>
 <th>Author</th>
 <th>Category</th>
 <th>Stage</th>
 <th>Own</th>
 <th>Format</th>
 <th>Description</th>
 </tr>
 </thead>
 <tbody>
 <?php
 
 
 while ($row = mysqli_fetch_array($result)) {
   echo '<tr class="divbutton">';
   echo '<td>' . $row["Id"] . '</td>';
   echo '<td><a href="' . $row["URL"] . '" target="blank">' . $row["Title"] . '</a></td>';
   echo '<td>' . $row["Author"] . '</td>';
   echo '<td>' . $row["Category"] . '</td>';
   echo '<td>' . $row["Stage"] . '</td>';
   echo '<td>' . $row["Own"] . '</td>';
   echo '<td>' . $row["Format"] . '</td>';
   echo '<td>' . $row["Description"] . '</td>';
   echo '</tr>';
 
 }
 mysqli_close($db);
   ?>
 
 </tbody></table>

<!-- </div> -->
    <!-- Modals  ------------------------------------------------------------------ -->
    <?php
    //<!--modal Upload-->
                echo '<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                  echo '<div class="modal-dialog" role="document">';
                    echo '<div class="modal-content">';
                      echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="exampleModalLabel">Upload Book List</h5>';
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
      ?>

      <script type="text/javascript">
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
); 
</script>
</body>
</html>