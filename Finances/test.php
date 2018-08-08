<?php
//function get_data(){
    include_once "dbconn/variables.php";
    $db = mysqli_connect($server,$user,$pass,$table)
        or die('Error connecting to MySQL server.');

  $query = "SELECT `Balance`, `TDate`, `Id`
  FROM Register
  WHERE Id IN (SELECT MAX(Id)
      from 
          (SELECT * FROM Register WHERE `TDate` BETWEEN '2018-07-01' AND '2018-07-31' ORDER BY `TDate` ) x   
   
      GROUP BY TDate)";

   $result = mysqli_query($db, $query) or die('Error querying database.');
 
   //$resultsArray = array();
   
//    echo 'data.addColumn("number", "Balance");';
//    echo 'data.addColumn("string", "Date");';

//    echo 'data.addRows([';
//orange = <div id="ff9900"></div>
//green = <div id="28a745"></div>


    while ($row = mysqli_fetch_array($result)){
    //$resultsArray[] = array(
        //'Id' => $row["Id"],
        $TDate = $row["TDate"];
        $Balance = $row["Balance"];
        if ($Balance <= 200){
            $Color = "#ff9900";
        }
        else if ($Balance <= 0){
            $Color = "#dc3545";
        }
        else {
            $Color = "#28a745";
        }
        echo "['" . $TDate . "', " . $Balance . ", '" . $Color . "'],";
         //echo '[{v: ' . $row["Balance"] . '}, '. $row["TDate"] . '],';
        // echo '{
        //     c: [{ v: ' . $row["Balance"] . ' },
        //         { v: ' . $row["TDate"] . ' }                
        //     ]
        // },';
        //echo $row["Balance"] .', ';
        //echo $row["TDate"] . '</br>';
        //); 
    //);
    
    };
    
    // echo ']);';
    ?>
 



  


