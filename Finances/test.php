<?php
function get_data(){
    include_once "dbconn/variables.php";
    $db = mysqli_connect($server,$user,$pass,$table)
        or die('Error connecting to MySQL server.');

//p is the start date;
$p = intval($_GET['p']);
//q is the end date;
$q = intval($_GET['q']);

//r is the start year;
$r = intval($_GET['r']);
//s is the end year;
$s = intval($_GET['s']);

$beginDate = $r . "-" . $p . "-01";
$endDate =  $s . "-" . $q . "-31";



  $query = "SELECT `Balance`, `TDate`, `Id`
  FROM Register
  WHERE Id IN (SELECT MAX(Id)
      from 
          (SELECT * FROM Register WHERE `TDate` BETWEEN '" . $beginDate . "' AND '" . $endDate . "' ORDER BY `TDate` ) x 
   
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
        
        $resultsArray[] = array(
            'TDate' => $TDate,
            'Balance' => $Balance,
            'Color' => $Color
        );
        //echo "['" . $TDate . "', " . $Balance . ", '" . $Color . "'],";
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
    return json_encode($resultsArray);
};
print_r(get_data());
    // echo ']);';
    ?>
 



  


