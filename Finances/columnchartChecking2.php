<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <div id="chart_div"></div>
  
  <script>

  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.arrayToDataTable([
        ['Date', 'Balance', { role: 'style' }],
        // ['2018-06-01', 2677.42],
        // ['2018-06-04', 821.09],
        // ['2018-06-05', 465.25],
        // ['2018-06-06', 455.37],
        // ['2018-06-07', 263.90]
        <?php include_once "test.php";?> 
        
      ]);

      var options = {
        title: 'Balance by Date',
        height: 400,
        hAxis: {
          title: 'Date',
          textStyle: {
            color: 'white',
            },
          //format: 'h:mm a',
          // viewWindow: {
          //   min: [7, 30, 0],
          //   max: [17, 30, 0]
          // }
          //allowContainerBoundaryTextCufoff: false,
          //slantedText: true,
          //slantedTextAngle:45,
          showTextEvery: 5,
          
        },
        vAxis: {
          title: 'Balance'
        },

        legend: {
          position: 'none',
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  // google.charts.setOnLoadCallback(drawChart);

    // function drawChart() {
    //   var data = new google.visualization.DataTable();
    //   data.addColumn('number', 'Balance');
    //   data.addColumn('string', 'Date');
    //   data.addRows([
    //       // </script> <?php //include_once "test.php";?> <script>
    //       [{v: 2677.42}, '2018-06-01'],
    //       [{v: 821.09}, '2018-06-04'],
    //       [{v: 465.25}, '2018-06-05'],
    //       [{v: 455.37}, '2018-06-06'],
    //       [{v: 263.90}, '2018-06-07'],
    //       [{v: 504.80}, '2018-06-08'],
    //       [{v: 764.12}, '2018-06-11'],
    //       [{v: 927.78}, '2018-06-12'],
    //       [{v: 908.32}, '2018-06-13'],
    //       [{v: 64.65}, '2018-06-14'],
    //       [{v: 2856.94}, '2018-06-15'],
    //       [{v: 1299.35}, '2018-06-18'],
    //       [{v: 834.34}, '2018-06-19'],
    //       [{v: 822.79}, '2018-06-20'],
    //       [{v: 647.04}, '2018-06-21'],
    //       [{v: 628.85}, '2018-06-22'],
    //       [{v: 288.83}, '2018-06-25'],
    //       [{v: 283.57}, '2018-06-26'],
    //       [{v: 454.55}, '2018-06-27'],
    //       [{v: 347.20}, '2018-06-28'],
    //       [{v: 3328.29}, '2018-06-29'],
    //       [{v: 865.89}, '2018-07-02'],
    //       [{v: 860.82}, '2018-07-03'],
    //       [{v: 558.37}, '2018-07-05'],
    //       [{v: 350.77}, '2018-07-06'],
    //       [{v: 224.72}, '2018-07-09'],
    //       [{v: 124.47}, '2018-07-10'],
    //       [{v: 105.64}, '2018-07-11'],
    //       [{v: 94.78}, '2018-07-12'],
    //       [{v: 3034.04}, '2018-07-13'],
    //       [{v: 1761.78}, '2018-07-16'],
          
    //       ]);

    //   var options = {
    //           title: 'Balance Per Day',
    //           hAxis: {
    //             title: 'Date',
    //             //format: 'h:mm a',
    //             viewWindow: {
    //               min: [7, 30, 0],
    //               max: [17, 30, 0]
    //             }
    //           },
    //           vAxis: {
    //             title: 'Balance'
    //           }
    //         };

    //         var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

    //         chart.draw(data, options);
      // var jsonData = $.ajax({
      //     url: "test.php",
      //     dataType: "json",
      //     async: false
      //     }).responseText;

      // Create our data table out of JSON data loaded from server.
      //var data = new google.visualization.DataTable(jsonData);
      //var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
     // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      
/*       var options = {
        title: 'Balance Per Day',
        hAxis: {
          title: 'Date',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Balance'
        }
      }; */
      //chart.draw(data, {width: 400, height: 240});
      //chart.draw(data, options);
      
    }




  </script>