<?php

include_once "dbconn/variables.php";

//Step1
 $db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checking Calendar</title>
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
  

  <script>

$(document).ready(function() {



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
      eventDrop: function(event, delta) {
        //alert(event.title + " was dropped on " + event.start.format());
        //var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD");
        var start = event.start.format();
        document.getElementById("recordID").value = event.Id;
        document.getElementById("Account").value = event.Account;
        document.getElementById("tDate").value = start;
        document.getElementById("pDate").value = start;
        document.getElementById("CkNo").value = event.CkNo;
        document.getElementById("Desc").value = event.tD;
        document.getElementById("Debit").value = event.Debit;
        document.getElementById("Credit").value = event.Credit;
        document.getElementById("Category").value = event.Category;
        document.getElementById("RecurId").value = event.id;
        document.getElementById("btnupdate").click();
      },
	 
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
              text: event.amt,
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
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
      /* var title = prompt('Event Title:');
      var url = prompt('Type Event url, if exits:');
      if (title) {
      var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
      $.ajax({
      url: 'http://localhost:8888/fullcalendar/add_events.php',
      data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
      type: "POST",
      success: function(json) {
      alert('Added Successfully');
      }
      });
      calendar.fullCalendar('renderEvent',
      {
      title: title,
      start: start,
      end: end,
      allDay: allDay
      },
      true // make the event "stick"
      );
      }
      calendar.fullCalendar('unselect'); */
      var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
      document.getElementById("addtDate").value = start;
      document.getElementById("addpDate").value = start;
      document.getElementById("addCategory").value = "";
      document.getElementById("btnAdd").click();
      
      },
      
      eventClick: function(calEvent) {
      //alert('Event: ' + calEvent.title + '\r\nID: ' + calEvent.Id + '\r\nAccount: ' + calEvent.Account + '\r\nTDate: ' + calEvent.TDate + '\r\nPDate: ' + calEvent.PDate + '\r\nCkNo: ' + calEvent.CkNo + '\r\ntD: ' + calEvent.tD + '\r\nDebit: ' + calEvent.Debit + '\r\nCredit: ' + calEvent.Credit + '\r\nCategory: ' + calEvent.Category);
      //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
      //alert('View: ' + view.name);
      //document.getElementById("btnEdit").click(calEvent.Id, calEvent.Account, calEvent.TDate, calEvent.PDate, calEvent.CkNo, calEvent.tD, calEvent.Debit, calEvent.Credit, calEvent.Category);
      document.getElementById("recordID").value = calEvent.Id;
      document.getElementById("Account").value = calEvent.Account;
      document.getElementById("tDate").value = calEvent.TDate;
      document.getElementById("pDate").value = calEvent.PDate;
      document.getElementById("CkNo").value = calEvent.CkNo;
      document.getElementById("Desc").value = calEvent.tD;
      document.getElementById("Debit").value = calEvent.Debit;
      document.getElementById("Credit").value = calEvent.Credit;
      document.getElementById("Category").value = calEvent.Category;
      document.getElementById("RecurId").value = calEvent.id;
      document.getElementById("btnEdit").click();
      //calendar.fullCalendar( ‘rerenderEvents’ );

      // change the border color just for fun
      //$(this).css('border-color', 'red');

      },
      /* eventClick: function(event, element) {
      event.title = "CLICKED!",
      $('#calendar').fullCalendar('updateEvent', event)
      }, */
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



<!-- NAV BAR ---------------------------------------------------------------------------------------------------------------------------------- -->

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
  <div class="d-flex ml-auto"></div>
    
  
</nav>


<!-- Modals -->
<?php
                  //<!--modal Edit-->
                  //event.Id, event.Account, event.TDate, event.PDate, event.CkNo, event.tD, event.Debit, event.Credit, event.Category
                  echo '<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
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
                          echo '<label for="recordID" class="col-sm-4 col-form-label">RecordID:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID" readonly value="">';
                            echo '</div>';
                          echo '<label for="Account" class="col-sm-4 col-form-label">Account:</label>';
                            echo '<div class="col-sm-8">';
                          //echo $row["Account"];
                          echo '<input type="text" class="form-control-plaintext" name="Account" id="Account" readonly value="Account">';
                            echo '</div>';
                          echo '</div>';
                          echo '<div class="form-group row">';
                          echo '<label for="tDate" class="col-sm-4 col-form-label control-label">Transaction Date:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="date" class="form-control" name="TDate" id="tDate" value="TDate">';
                            echo '</div>';
                          echo '<label for="pDate" class="col-sm-4 col-form-label control-label">Posted Date:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="date" class="form-control" name="PDate" id="pDate" value="PDate">';
                            echo '</div>';
                          echo '<label for="CkNo" class="col-sm-4 col-form-label">Check #:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="CkNo" id="CkNo" value="CkNo">';
                            echo '</div>';
                          echo '<label for="Desc" class="col-sm-4 col-form-label">Description:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Description" id="Desc" value="tD">';
                            echo '</div>';
                          echo '<label for="Debit" class="col-sm-4 col-form-label">Debit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="text-danger form-control" name="Debit" id="Debit" value="Debit">';
                            echo '</div>';
                          echo '<label for="Credit" class="col-sm-4 col-form-label">Deposit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Credit" id="Credit" value="Credit">';
                            echo '</div>';
                          echo '<label for="Category" class="col-sm-4 col-form-label">Category:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<select class="form-control" name="Category" id="Category" value="Category>';
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
                          echo '<label for="RecurId" class="col-sm-4 col-form-label">RecurID:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="RecurId" id="RecurId" value="RecurId">';
                            echo '</div>';
                            echo '</div>';
                          echo '</div>';
                      echo '<div class="modal-footer">';
                        echo '<button type="submit" class="float-left btn btn-primary" name="update" id="btnupdate" value="update">Save changes</button>';
                        echo '<button type="button" class="float-left btn btn-secondary" data-dismiss="modal">Cancel</button>';
                        echo '<button type="submit" class="float-right btn btn-danger" name="delete" value="delete" onclick="form.submit(name=delete)">Delete</button>';

                        echo '</div>';
                          echo '</form>';
                    echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  //<!--end modal Edit-->


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
                          echo '<input type="text" class="form-control" name="TDate" id="addtDate" value="">';
                            echo '</div>';
                          echo '<label for="pDate" class="col-sm-4 col-form-label">Posted Date:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="PDate" id="addpDate" value="">';
                            echo '</div>';
                          echo '<label for="CkNo" class="col-sm-4 col-form-label">Check #:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="CkNo" id="addCkNo" value="">';
                            echo '</div>';
                          echo '<label for="Desc" class="col-sm-4 col-form-label">Description:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Description" id="addDesc" value="">';
                            echo '</div>';
                          echo '<label for="Debit" class="col-sm-4 col-form-label">Debit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="text-danger form-control" name="Debit" id="addDebit" value="">';
                            echo '</div>';
                          echo '<label for="Credit" class="col-sm-4 col-form-label">Deposit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Credit" id="addCredit" value="">';
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
      ?>
<!-- End Modals -->

<!-- Calendar   ---------------------------------------------------------------------------------------------------------------------------------- -->
<p>
<div class="container">

<div id="calendar">
<a href="https://fullcalendar.io/docs" target="_blank" >documentation</a>
<!-- End Calendar   ---------------------------------------------------------------------------------------------------------------------------------- -->
</div>
</div>
<!-- Buttons -->
<div style="visibility:hidden">
<button type="button" class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modalEdit">Edit</button>'
<button type="button" class="btn btn-success btn-sm" id="btnAdd" data-toggle="modal" data-target="#modalAdd">Add</button>
</div>
<!-- End Buttons -->
</body>
</html>
