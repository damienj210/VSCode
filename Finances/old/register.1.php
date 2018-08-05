<?php

include_once "dbconn/variables.php";

//Step1
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
  <link href='../Calendar/css/fullcalendar.css' rel='stylesheet'/>
  <link href='../Calendar/css/fullcalendar.print.css' rel='stylesheet' media='print'/>
  <link href='https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css' rel='stylesheet' />
  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
  <link type="text/css" rel="stylesheet" href="../Calendar/css/jquery.qtip.css" />
  <link href='../Calendar/css/mystuff.css' rel='stylesheet'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src='../Calendar/js/moment.js'></script>
  <script src='../Calendar/js/jquery.js'></script>
  <script src='../Calendar/js/fullcalendar.js'></script>
  <script src="../Calendar/js/jquery.qtip.js"></script>
  <script src="../Calendar/js/popover.js"></script>
  <script src="../Calendar/js/mystuff.js"></script>
  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
   <!-- SimplePagination Plugin -->
   <script type="text/javascript" src="./js/simplepagination.js"></script>
  <link rel="stylesheet" href="./css/simplepagination.css"/>
  

  <script>

$(document).ready(function() {

<!-- $(function() { -->

  // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
      //themeSystem: 'jquery-ui',
      themeSystem: 'bootstrap4',
      //bootstrapFontAwesome: true,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,listWeek'
      },
      //defaultDate: '2018-03-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
	 
      //events: 'dbconn/myfeed.php',
      eventSources: [
	  {
		  url: 'dbconn/myfeed.php',
		  textColor: 'white'
	  }
	  ],
      eventRender: function(event, element) {
        element.qtip({
           content: {
              text: event.test,
              title: event.title
          },
          position: {
             target: 'mouse', // Track the mouse as the positioning target
             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
          },
          style: {
          classes: 'qtip-green qtip-shadow'
          }
        });
      }
});
});


</script>
<style>
  #calendar {
    max-width: 100%;
    margin: 0 auto;
  }

</style>
  
</head>
<body>

<!--<div class="container-fluid" style="margin:0 width:100%">
  <h3>Rivera Checking</h3>
</div>-->

<!-- NAV BAR ---------------------------------------------------------------------------------------------------------------------------------- -->

<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark left"><nav class="nav flex-column bg-dark navbar-dark">-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" style="margin:0 width:100%">
  <a class="navbar-brand" href="#">
  	<img src="../images/Damien.png" alt="Damien" style="width:40px;">
</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <button class="nav-link btn btn-link" id="registerBtn" data-toggle="collapse" data-target="#register" aria-expanded="true" aria-controls="register">Register</a>
    </li>
    <li class="nav-item">
      <button class="nav-link btn btn-link" id="categoriesBtn" data-toggle="collapse" data-target="#categories" aria-expanded="true" aria-controls="categories">Categories</a>
    </li>
    <li class="nav-item">
      <button class="nav-link btn btn-link" id="calendarBtn" data-toggle="collapse" data-target="#calendar" aria-expanded="false" aria-controls="calendar">Calendar</a>
    </li>
    <li class="nav-item">
      <button class="nav-link btn btn-link" id="reportsBtn" data-toggle="collapse" data-target="#reports" aria-expanded="false" aria-controls="reports">Reports</a>
    </li>
    
    
  </ul>
  <button type="button" class="btn btn-success" style="display: block; margin: 0 auto;">
            <?php
            $query = "SELECT SUM(Debit) AS debit, SUM(Credit) AS credit FROM Register";
            //$query = "SELECT SUM(Debit + Credit) FROM Register";
            //mysqli_query($db, $query) or die('Error querying database.');
            $result = mysqli_query($db, $query)  or die('Error querying database.');
            while ($row = mysqli_fetch_array($result)) {
            $Balance = $row["credit"] + $row["debit"];
            echo 'Balance: ' . $Balance;
            }
            ?></button>
    
  <div class="ml-auto navbutton">
    <!-- <button type="button" class="btn btn-success btn-sm" id="btnUploadCat" data-toggle="modal" data-target="#modalUploadCat">UploadCategories</button> -->
    <button type="button" class="btn btn-success btn-sm" id="btnUpload" data-toggle="modal" data-target="#modalUpload">Upload</button>
    <button type="button" class="btn btn-success btn-sm" id="btnAdd" data-toggle="modal" data-target="#modalAdd">Add</button>
  </div>
  
</nav>

<!-- Accordion Begin   ---------------------------------------------------------------------------------------------------------------------------------- -->

<div id="accordion">

<!-- Register  ---------------------------------------------------------------------------------------------------------------------------------- -->

<div class="collapse show" id="register" aria-labelledby="headingOne" data-parent="#accordion">
<?php
            // $rowperpage = 5;
            // $row = 0;

            // Previous Button
            // if(isset($_POST['but_prev'])){
                // $row = $_POST['row'];
                // $row -= $rowperpage;
                // if( $row/ < 0 ){
                    // $row = 0;
                // }
            // }

            // Next Button
            // if(isset($_POST['but_next'])){
                // $row = $_POST['row'];
                // $allcount = $_POST['allcount'];
                // $row += $rowperpage;
                /* $val = $row + $rowperpage;
                if( $val <= $allcount ){
                    $row = $val;
                } */
            // }
        ?>
<?php
 //Step2
             // count total number of rows
            $query = "SELECT COUNT(*) AS cntrows FROM Register";
            $result = mysqli_query($db,$query);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];
 
 //SELECT SUM(Price) AS TotalCost, SUM(SupplierID) AS FinalCost, SUM(Price + SupplierID) AS Added FROM Products;
 //$query SELECT SUM(Debit + Credit) AS Balance FROM Register;
//  $query = "SELECT * FROM Register ORDER BY Id DESC LIMIT " . $row . ", " . $rowperpage . ";";
$query = "SELECT * FROM Register ORDER BY Id DESC";
//"
 //mysqli_query($db, $query) or die('Error querying database.');
 
 //Step3
 $result = mysqli_query($db, $query) or die('Error querying database.');
 //$row = mysqli_fetch_array($result);
 
 //Step 4
 //mysqli_close($db);
 //$sno = $row + 1;
?>

<table class="table table-striped table-hover tableFixHead">
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

	 while ($row = mysqli_fetch_array($result)) {
		echo '<tr class="divbutton">';
		echo '<td>' . $row["Id"] . '</td>';
		echo '<td>' . $row["TDate"] . '</td>';
		echo '<td>' . $row["CkNo"] . '</td>';
    echo '<td>' . $row["Description"] . '</td>';
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
    echo '<td></td>';
		echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $row["Id"] . '" data-toggle="modal" data-target="#modalEdit' . $row["Id"] . '">Edit</button>';
		echo '</tr>';
		?>

		<?php
		//<!--modal Edit-->
          echo '<div class="modal fade" id="modalEdit' . $row["Id"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
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
                    echo '<label for="recordID' . $row["Id"] . '" class="col-sm-4 col-form-label">RecordID:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID' . $row["Id"] . '" readonly value="' . $row["Id"] . '">';
                       echo '</div>';
                    echo '<label for="Account' . $row["Id"] . '" class="col-sm-4 col-form-label">Account:</label>';
                       echo '<div class="col-sm-8">';
                    echo $row["Account"];
                    //echo '<input type="text" class="form-control-plaintext" name="Account" id="Account' . $row["Id"] . '" readonly value="' . $row["Account"] . '">';
                       echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group row">';
                    echo '<label for="tDate' . $row["Id"] . '" class="col-sm-4 col-form-label control-label">Transaction Date:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="date" class="form-control" name="TDate" id="tDate' . $row["Id"] . '" value="' . $row["TDate"] . '">';
                       echo '</div>';
                    echo '<label for="pDate' . $row["Id"] . '" class="col-sm-4 col-form-label control-label">Posted Date:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="date" class="form-control" name="PDate" id="pDate' . $row["Id"] . '" value="' . $row["PDate"] . '">';
                       echo '</div>';
                    echo '<label for="CkNo' . $row["Id"] . '" class="col-sm-4 col-form-label">Check #:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="CkNo" id="CkNo' . $row["Id"] . '" value="' . $row["CkNo"] . '">';
                       echo '</div>';
                    echo '<label for="Desc' . $row["Id"] . '" class="col-sm-4 col-form-label">Description:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="Description" id="Desc' . $row["Id"] . '" value="' . $row["Description"] . '">';
                       echo '</div>';
                    echo '<label for="Debit' . $row["Id"] . '" class="col-sm-4 col-form-label">Debit:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="text-danger form-control" name="Debit" id="Debit' . $row["Id"] . '" value="' . $row["Debit"] . '">';
                       echo '</div>';
                    echo '<label for="Credit' . $row["Id"] . '" class="col-sm-4 col-form-label">Deposit:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<input type="text" class="form-control" name="Credit" id="Credit' . $row["Id"] . '" value="' . $row["Credit"] . '">';
                       echo '</div>';
                    echo '<label for="Category' . $row["Id"] . '" class="col-sm-4 col-form-label">Category:</label>';
                       echo '<div class="col-sm-8">';
                    echo '<select class="form-control" name="Category" id="Category' . $row["Id"] . '" value="' . $row["Category"] . '">';
                    $Catquery = "SELECT * FROM Categories";
                    $CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
                    while ($CatRow = mysqli_fetch_array($CatResult)) {
                      if ($CatRow["Category"] == $row["Category"]){
                        echo '<option value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
                      }
                      //if ($CatRow["ParentCategory"] == NULL){
                        //echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                      //}
                      else {
                        echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                        //echo '<option value="' . $CatRow["ParentCategory"] . ':' . $CatRow["Category"] . '">' . $CatRow["ParentCategory"] . ':' . $CatRow["Category"] . '</option>';
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
//$sno ++;
//data-toggle="modal" data-target="#exampleModal"
?>

<!--<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>-->
</tbody></table>
<div class="pagination">
<?php  
        $sql = "SELECT COUNT(*) FROM Register"; 
        $limit = 10; 
        $rs_result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_row($rs_result);  
        $total_records = $row[0];  
        $total_pages = ceil($total_records / $limit);  
        $pagLink = "<nav><ul class='pagination'>";  
        for ($i=1; $i<=$total_pages; $i++) {  
                     $pagLink .= "<li><a href='register.php?page=" . $i . "'>" . $i ."</a></li>";  
        };  
        echo $pagLink . "</ul></nav>";  
?>
<script>
$(document).ready(function() {
  $('.pagination').pagination({
                    items: <?php echo $total_records;?>,
                    itemsOnPage: <?php echo $limit;?>,
                    cssStyle: 'light-theme',
                    currentPage : <?php echo $page;?>,
                    hrefTextPrefix : 'register.php?page='
                });
                });
</script>
</div>
            
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
                    //echo 'File name to import:</br>';
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
<script>
$('.tableFixHead').on('scroll', function() {
  $('thead', this).css('transform', 'translateY('+ this.scrollTop +'px)');
});
</script>
<?php
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
?>

<!--
        <form method="post" action="">
            <div id="div_pagination">
                <input type="hidden" name="row" value="<?php //echo $row; ?>">
                <input type="hidden" name="allcount" value="<?php //echo $allcount; ?>">
                <input type="submit" class="button" name="but_prev" value="Previous">
				<?php //echo $row; ?> , <?php //echo $allcount; ?>
                <input type="submit" class="button" name="but_next" value="Next">
            </div>
        </form>
-->

<!-- End Register  ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
<!--</div>
</div>
<!-- Categories ---------------------------------------------------------------------------------------------------------------------------------- -->

<div class="collapse" id="categories" aria-labelledby="headingTwo" data-parent="#accordion">
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
                  echo '<h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>';
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
          //<!--end modal Edit-->

		
 	 }
?>
</tbody></table>

Categories will be here
<!-- End Categories   ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>

<!-- Calendar   ---------------------------------------------------------------------------------------------------------------------------------- -->

<div class="collapse" id="calendar" aria-labelledby="headingThree" data-parent="#accordion">
<a href="https://fullcalendar.io/docs" target="_blank" >documentation</a>
<!-- End Calendar   ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
<!-- Reports ---------------------------------------------------------------------------------------------------------------------------------- -->

<div class="collapse" id="reports" aria-labelledby="headingFour" data-parent="#accordion">
Reports will be here
<!-- End Reports   ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
<!--</div>
</div>
<!-- End Accordion   ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
</body>
</html>
