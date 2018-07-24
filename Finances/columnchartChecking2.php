<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>

  <script>
  google.charts.load('current', {packages: ['corechart','bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');
      data.addColumn('string', "color");


      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1, 'color:yellow'],
        [{v: [9, 0, 0], f: '9 am'}, 2, 'color:yellow'],
        [{v: [10, 0, 0], f:'10 am'}, 3, 'color:red'],
        [{v: [11, 0, 0], f: '11 am'}, 4, 'color:yellow'],
        [{v: [12, 0, 0], f: '12 pm'}, 3, 'color:yellow'],
        [{v: [13, 0, 0], f: '1 pm'}, -6, 'color:red'],
        [{v: [14, 0, 0], f: '2 pm'}, 7, 'color:yellow'],
        [{v: [15, 0, 0], f: '3 pm'}, 4, 'color:yellow'],
        [{v: [16, 0, 0], f: '4 pm'}, 9, 'color:yellow'],
        [{v: [17, 0, 0], f: '5 pm'}, 5, 'color:yellow']
      ]);

      var options = {
        title: 'Motivation Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };
      //var chart = new google.charts.Bar(
      var chart = new google.visualization.BarChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>