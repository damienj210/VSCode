<?php

include_once "dbconn/variables.php";
                /* $db = mysqli_connect($server,$user,$pass,$table)
                or die('Error connecting to MySQL server.');
                $query = "SELECT * FROM Register";
                //$query = "SELECT * FROM Register WHERE Category LIKE '%rent%'";
                $result = mysqli_query($db, $query) or die('Error querying database.'); */
                //<?php 
                /*  $DebitTot = 0;
                 $CreditTot = 0;
                 while ($row = mysqli_fetch_assoc($result)){
                 $DebitTot += $row['Debit'];
                 $CreditTot += $row['Credit'];
                 $RunTot = round($CreditTot + $DebitTot, 2);
                 
                 echo "['" .$row['TDate']. "', '"  . $RunTot . "'],"; */
               //}
          /*  //?> */
  
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
          callback: drawChart,
          packages: ['corechart']
        });

function drawChart() {
  var data = google.visualization.arrayToDataTable([
   // var data = google.visualization.DataTable();
      /* data.addColumn('string', 'Date');
      data.addColumn('number', 'Total');
      data.addRows([ */
                [1, 254.50,'2018-01-24'],
                [2, -135.40,'2018-01-25']
      ]);

  var view = new google.visualization.DataView(data);
  view.setColumns([0, 1,
    // style column
    {
      calc: function (dt, row) {
        if ((dt.getValue(row, 1) >= 0) && (dt.getValue(row, 1) <= 60)) {
          return 'green';
        } else if ((dt.getValue(row, 1) > 60) && (dt.getValue(row, 1) <= 100)) {
          return 'yellow';
        } else {
          return 'red';
        }
      },
      type: 'string',
      role: 'style'
    },
    // annotation column
    {
      calc: 'stringify',
      sourceColumn: 1,
      type: 'string',
      role: 'annotation'
    }
  ]);

  var options = {
    title: 'Balance per day',
    subtitle: 'Checking Account',
    titleTextStyle: {
      fontSize: 16,
      bold: true
    },
  
    backgroundColor: 'transparent',
    chartArea: {
      left:80,
      top:30,
      bottom:60,
      right:10
    },
    legend: {
      textStyle: {
        fontSize: 11
      }
    },
    vAxis: {
      title: 'Balance',
      textStyle: {
        fontName: 'Arial',
        fontSize: 10
      },
      titleTextStyle: {
        fontSize: 12,
        italic: false,
        bold:true
      }
    },
    hAxis: {
      title: 'Date',
      gridlines: {
        count: 22
      },
      textStyle: {
        fontName: 'Arial',
        fontSize: 11
      },
      titleTextStyle: {
        fontSize: 12,
        italic: false ,
        bold:true
      }
    },
    pointSize: 3,
    pointShape: 'circle',
    annotations: {
      alwaysOutside: true,
      textStyle: {
        fontName: 'Arial',
        fontSize: 9,
        color: '#000000',
        opacity: 1
      }
    } 
  };

  var chartDiv = document.getElementById('chart_div');
  var chart = new google.visualization.ColumnChart(chartDiv);
  //var chart = new google.charts.Bar(chartDiv);
  chart.draw(view, options);
};

        </script>
 /* Hi There This is not working but I'll get it there!

       <div id="chart_div"></div>