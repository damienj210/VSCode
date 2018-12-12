<?php
// function get_data(){
    include_once "dbconn/variables.php";
    $db = mysqli_connect($server,$user,$pass,$table)
        or die('Error connecting to MySQL server.');

//q is the start date; 
$q = intval($_GET['q']);
// echo $q;

// $q = intval($_GET['q']);
// $q = "2018-11-01";

//r is the end date;
$r = intval($_GET['r']);
// echo "-" . $r;
// alert($r);
// $r = "2018-11-31";
$beginDate = $r . "-" . $q . "-01";
//echo $beginDate;
// $beginDate = "2018-11-01";
// $endDate = "2018-11-31";
// $r = "2018-11-31";
$endDate =  $r . "-" . $q . "-31";
//echo $endDate;
// alert($beginDate . " -- " . $endDate);


  $query = "SELECT `Balance`, `TDate`, `Id`
  FROM Register
  WHERE Id IN (SELECT MAX(Id)
      from 
          (SELECT * FROM Register WHERE `TDate` BETWEEN '" . $beginDate . "' AND '" . $endDate . "' ORDER BY `TDate` ) x 
   
      GROUP BY TDate)";

   $result = mysqli_query($db, $query) or die('Error querying database.');


$event_data = "";
    while ($row = mysqli_fetch_array($result)){
        $TDate = $row["TDate"];
        $Balance = $row["Balance"];
        // if ($Balance <= 200){
        //     $Color = "#ff9900";
        // }
        // else if ($Balance <= 0){
        //     $Color = "#dc3545";
        // }
        // else {
        //     $Color = "#28a745";
        // }
        if ($event_data == ""){
            $event_data = $event_data . '{"c":[{"v":"' . $TDate . '","f":null},{"v":' . $Balance . ',"f":null}]}';
        }   
        else {
            $event_data = $event_data . ',{"c":[{"v":"' . $TDate . '","f":null},{"v":' . $Balance . ',"f":null}]}';
        } 
        
            // 'date' => $TDate,
            // 'balance' => $Balance,
            // 'color' => $Color,
            //
        // );

    
    }
    // return json_encode($event_data);
    // print_r($event_data);

    // print_r($event_data);
// }
    
//echo '<pre>';
// print_r(get_data());
//echo '</pre>';
   
 
 echo '{
  "cols": [
        {"id":"","label":"date","pattern":"","type":"string"},
        {"id":"","label":"balance","pattern":"","type":"number"}
      ],
  "rows": [
        
        ' . $event_data . '
      ]
}';

 ?>


  


