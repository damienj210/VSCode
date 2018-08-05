<?php

include_once "dbconn/variables.php";

 $Spendingdb = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
   $querySpending = "SELECT Category, sum(Debit) FROM Register group by Category";
   $resultSpending = mysqli_query($Spendingdb, $querySpending)  or die('Error querying database.');

 $Depositsdb = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
   $queryDeposits = "SELECT tD,sum(Credit) FROM Register GROUP BY tD HAVING sum(Credit)>0 ";
   $resultDeposits = mysqli_query($Depositsdb, $queryDeposits)  or die('Error querying database.');

                  /*  <?php
               while($row=$resultSpending->fetch_assoc()) 
                {
                    echo "['".$row['Category']."', ".abs($row['sum(Debit)'])."],";
                } 
                ?>      */


  
?>  

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["bar"]});
          google.charts.setOnLoadCallback(drawChart);
         

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Year', 'Visitations', { 'role: 'style' } ],
            ['2010', 10, 'color: gray'],
            ['2020', 14, 'color: #76A7FA'],
            ['2030', 16, 'opacity: 0.2'],
            ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
            ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
          ]);


              var options = {
                chart: {
                  title: 'Balance per day',
                  subtitle: 'Checking Account'
                },

              };
        
              var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
              materialChart.draw(data, google.charts.Bar.convertOptions(options));
              //chart.draw(data, google.charts.Bar.convertOptions(options));
            }

        </script>
        <div id="chart_div"></div>