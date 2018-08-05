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

  
?> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChartSpending);
      google.charts.setOnLoadCallback(drawChartDeposits);

            function drawChartSpending() {

              var data = google.visualization.arrayToDataTable([
              ['Category', 'Total'],
              <?php
                while($row=$resultSpending->fetch_assoc()) 
                {
                    echo "['".$row['Category']."', ".abs($row['sum(Debit)'])."],";
                }
              ?>
              ]);

              var options = {
                title:'Spending By Category',
                is3D:true,
                width:500,
                height:400
              };

              var chart = new google.visualization.PieChart(document.getElementById('SavingsSpending_chart_div'));
              chart.draw(data, options);
              }
      
            function drawChartDeposits() {

              var data = google.visualization.arrayToDataTable([
                ['Description', 'Total'],
                
              <?php
                while($row=$resultDeposits->fetch_assoc())
                {
                    echo "['".$row['tD']."',".$row['sum(Credit)']."],";

                }
              ?> 
              ]);

              var options = {
                title:'Deposits By Description',
                is3D:true,
                width:500,
                height:400
              };

              var chart = new google.visualization.PieChart(document.getElementById('SavingsDeposits_chart_div'));
              chart.draw(data, options);
              }
    </script>

<div id="SavingsSpending_chart_div" class="d-flex mr-auto" display="block"></div>
<div id="SavingsDeposits_chart_div" class="d-flex ml-auto" display="block"></div>

