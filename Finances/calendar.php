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
        //alert(document.getElementById("tDate").value);
        document.getElementById("pDate").value = start;
        //alert(document.getElementById("pDate").value);
        document.getElementById("CkNo").value = event.CkNo;
        document.getElementById("Desc").value = event.tD;
        document.getElementById("Debit").value = event.Debit;
        document.getElementById("Credit").value = event.Credit;
        document.getElementById("Category").value = event.Category;
        document.getElementById("RecurId").value = event.id;
        // document.getElementById("Balance").value = event.Balance;
        //document.getElementById("frmUpdate").submit(name=update);
        //form.submit(name=update);
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
      var dow = $.fullCalendar.formatDate(start, "dddd");
      var dowtest = start;
      //alert('DOW: ' + dow);
      var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
      document.getElementById("addtDate").value = start;
      document.getElementById("addpDate").value = start;
      document.getElementById("addCategory").value = "";
      //document.getElementById("dOw").value = Date.parse(start);
      document.getElementById("dOw").value = weekAndDay(Date.parse(start));
      document.getElementById("addRecurrence").checked = false;
      //$('.collapse').collapse('toggle');
      //$('.collapse').collapse();
      //document.getElementById("demo").style.display = "none";
      document.getElementById("btnAdd").click();
      //console.log(weekAndDay(Date.parse(start)));
      
      
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
      // document.getElementById("Balance").value = calEvent.Balance;
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
<?php include_once "navbar.php" ?>

<script type="text/javascript">
    //changeIntSelect()
    function weekAndDay(date) {
    console.log(date);
    correctedDate=parseInt(date, 10)+ 86400000;
    console.log(correctedDate);
    var dayName = moment(correctedDate).format("dddd");
    var formattedDate = parseInt(moment(correctedDate).format("DD"), 10);
    var nth = Math.floor(formattedDate / 7)+1;

    console.log(dayName);
    console.log(formattedDate);
            var opt= document.getElementById('intMonthSelect').options[0];
              opt.value = "";
              opt.text = "";
            var opt= document.getElementById('intMonthSelect').options[1];
              opt.value = "";
              opt.text = "";
    return nth + " " + dayName;
    }

    function changeIntSelect($val)
    {
        if ($val === "week") {
            document.getElementById("RecurWeek").style.display = "inline";
        } else {
            document.getElementById("RecurWeek").style.display = "none";
        }
        if ($val === "month") {
            document.getElementById("RecurMonth").style.display = "inline";
            var start = document.getElementById("addtDate").value;
            var dow = document.getElementById("dOw").value;
            var res = start.split("-", 3);
            var res3 = res[2];
            //document.getElementById("intMonthSelect").value = "Monthly on day " + res3;
            var opt= document.getElementById('intMonthSelect').options[0];
              opt.value = "Monthly on day " + res3;
              opt.text = "Monthly on day " + res3;
            var opt= document.getElementById('intMonthSelect').options[1];
              opt.value = "Monthly on the " + res3 + "day";
              opt.text = "Monthly on the " + dow;
        } else {
            document.getElementById("RecurMonth").style.display = "none";
        }
    }
    //changeIntMonthSelect()
    function changeIntMonthSelect($val)
    {
        if ($val === "dayNumber") {
            //document.getElementById("RecurWeek").style.display = "inline";
        } else {
            //document.getElementById("RecurWeek").style.display = "none";
        }
        if ($val === "dayName") {
            //document.getElementById("RecurMonth").style.display = "inline";
        } else {
            //document.getElementById("RecurMonth").style.display = "none";
        }
    }


    function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<!-- Modals -->
<?php include_once "modalEdit.php"?>
<?php include_once "modalAdd.php"?>
     
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
