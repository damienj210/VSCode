<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <div id="chart_div"></div>

  <script>

  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var jsonData = $.ajax({
          url: "test.php",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
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
      chart.draw(data, {width: 400, height: 240});
      //chart.draw(data, options);
      
    }




  </script>