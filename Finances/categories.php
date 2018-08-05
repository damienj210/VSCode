<?php

include_once "dbconn/variables.php";

//Step1
 $db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checking Categories</title>
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

<!-- NAV BAR ----------------------------------------------------------------------- -->

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
    <button type="button" class="btn btn-success btn-sm" id="btnUpload" data-toggle="modal" data-target="#modalUpload">Upload</button>&nbsp;
    <button type="button" class="btn btn-success btn-sm" id="btnAdd" data-toggle="modal" data-target="#modalAdd">Add</button>
  </div>
  
</nav>



<!-- Categories ---------------------------------------------------------------------------------------------------------------------------------- -->

<div class="container">
<?php
 $CatQuery = "SELECT * FROM Categories";
 $CatResult = mysqli_query($db, $CatQuery) or die('Error querying database.');
?>

<table class="table table-striped table-hover tableFixHead">
<thead>
<tr>
<th>ID#</th>
<th>Parent Category</th>
<th>Category</th>
<th>Type</th>
</tr>
</thead>
<tbody>
<?php

	 while ($Catrow = mysqli_fetch_array($CatResult)) {
		echo '<tr class="divbutton">';
		echo '<td>' . $Catrow["Id"] . '</td>';
		echo '<td>' . $Catrow["ParentCategory"] . '</td>';
		echo '<td>' . $Catrow["Category"] . '</td>';
		echo '<td>' . $Catrow["Type"] . '</td>';

    echo '<td></td>';
		echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $Catrow["Id"] . '" data-toggle="modal" data-target="#modalCatEdit' . $Catrow["Id"] . '">Edit</button>';
		echo '</tr>';
		?>

		<?php
		//<!--modal CatEdit-->
          echo '<div class="modal fade" id="modalCatEdit' . $Catrow["Id"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog" role="document">';
              echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                  echo '<h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>';
                  echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                  echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                    echo '<form action="updatephp.php" method="post">';
                    echo '<div class="form-group row">';
                    echo '<label for="recordID' . $Catrow["Id"] . '" class="col-sm-4 col-form-label">RecordID:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID' . $Catrow["Id"] . '" readonly value="' . $Catrow["Id"] . '">';
                       echo '</div>';
                    echo '<label for="ParentCategory' . $Catrow["Id"] . '" class="col-sm-4 col-form-label">Parent Category:</label>';
                       echo '<div class="col-sm-8">';
                    
                    echo '<input type="text" class="form-control" name="ParentCategory" id="ParentCategory' . $Catrow["Id"] . '" value="' . $Catrow["ParentCategory"] . '">';
                       echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group row">';
                    echo '<label for="Category' . $Catrow["Id"] . '" class="col-sm-4 col-form-label control-label">Category:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="Category" id="Category' . $Catrow["Id"] . '" value="' . $Catrow["Category"] . '">';
                       echo '</div>';
                    echo '<label for="Type' . $Catrow["Id"] . '" class="col-sm-4 col-form-label control-label">Type:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="Type" id="Type' . $Catrow["Id"] . '" value="' . $Catrow["Type"] . '">';
                       echo '</div>';
                    
                    echo '</div>';
                echo '<div class="modal-footer">';
                  echo '<button type="submit" class="float-left btn btn-primary" name="CatUpdate" value="update">Save changes</button>';
                  echo '<button type="button" class="float-left btn btn-secondary" data-dismiss="modal">Cancel</button>';
                  echo '<button type="submit" class="float-right btn btn-danger" name="CatDelete" value="delete" onclick="form.submit(name=CatDelete)">Delete</button>';

                  echo '</div>';
                    echo '</form>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '</div>';
          //<!--end modal CatEdit-->

		
 	 }
?>
</tbody></table>
<?php
          //<!--modal Upload Categories-->
          echo '<div class="modal fade" id="modalUploadCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog" role="document">';
              echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                  echo '<h5 class="modal-title" id="exampleModalLabel">Upload Categories</h5>';
                  echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                  echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                    echo '<form enctype="multipart/form-data" action="updatephp.php" method="post" >';
                    //echo 'File name to import:</br>';
                    echo '<label class="btn btn-primary btn-file btn-block d-block"> Browse <input type="file" size="50" id="upload2" name="filename" hidden></label>';
                    echo '<label class="btn btn-secondary btn-block d-block" for="filename">File name to import</label>';
                echo '</div>';
                echo '<div class="modal-footer">';
                  echo '<button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>';
                  echo '<button type="submit" class="btn btn-primary" name="uploadCat" value="uploadCat">Upload</button>';
                echo '</div>';
                    echo '</form>';
              echo '</div>';
            echo '</div>';
          echo '</div>';
          //<!--end modal Upload Categories-->
?>

</div>
</body>
</html>
