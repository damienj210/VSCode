<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <div class="form-inline col-sm-10">
  <select class="form-control-sm col-sm-2" name="selMonth" id="selMonth" onChange="drawBasic();">
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option selected value="12">December</option>
  </select>
  <select class="form-control-sm col-sm-2" name="selYear" id="selYear" onChange="drawBasic();">
    <option selected value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
  </select>
    </div>
  <!-- <textarea rows="2" cols="70" class="form-control" name="hiddenText" id="hiddenText"></textarea> -->

  <div id="chart_div"></div>
  
  <script>

// function changeChartValues() {
  // $selMonth = document.getElementById("selMonth").value;
  // $selYear = document.getElementById("selYear").value;
  // drawBasic($selMonth,$selYear);
// }

  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawBasic);
  // $response = "start";

function drawBasic() {
  $selMonth = document.getElementById("selMonth").value;
  $selYear = document.getElementById("selYear").value;
  // alert($selMonth + "-" + $selYear);
  // var xhttp;
  // xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   // var resp1 = "resp1";
  //   if (this.readyState == 4 && this.status == 200) {
  //       $response = String(this.responseText);
  //       console.log($response);
  //       document.getElementById("hiddenText").value = $response;
  //       // return($response);
  //       // 
  //     }
  //     // $response = $resp1;
  //   };
    //alert($response);
  // xhttp.open("GET", "test.php?q=" + $selMonth + "&r=" + $selYear, true);
  // console.log("test.php?q=" + $selMonth + "&r=" + $selYear);
  // console.log($response);
  // xhttp.send();
var $query = "test1.php?q=" + $selMonth + "&r=" + $selYear;
// alert($query);
      var jsonData = $.ajax({
          url: $query,
          dataType: "json",
          async: false
          }).responseText;
// alert(jsonData);
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      // var data = new google.visualization.Query($query);
      // var data = new google.visualization.arrayToDataTable([
      //   ['Date', 'Balance', { role: 'style' }],
      //   // ['2018-06-01', 2677.42],
      //   // ['2018-06-04', 821.09],
      //   // ['2018-06-05', 465.25],
      //   // ['2018-06-06', 455.37],
      //   // ['2018-06-07', 263.90],
      //   echo($response)
      // ]);
// alert(data);
      var options = {        
        title: 'Balance by Date',
        height: 400,
        allowHtml: true,
        hAxis: {
          title: 'Date',
          textStyle: {
            color: 'white',
            },

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

        var formatter = new google.visualization.ColorFormat();
        formatter.addRange(null, 0, '#dc3545', '#dc3545');
        formatter.addRange(0, 200, '#ff9900', '#ff9900');
        formatter.addRange(200, null, '#28a745', '#28a745');
        formatter.format(data, 0); // Apply formatter to second column

      chart.draw(data, options);
    }

  </script>