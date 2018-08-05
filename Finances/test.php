<?php
//function get_data(){
    include_once "dbconn/variables.php";
    $db = mysqli_connect($server,$user,$pass,$table)
        or die('Error connecting to MySQL server.');

  $query = "SELECT `Balance`, `TDate`, `Id`
  FROM Register
  WHERE Id IN (SELECT MAX(Id)
      from 
          (SELECT * FROM Register ORDER BY `TDate`) x   
   
      GROUP BY TDate)";

   $result = mysqli_query($db, $query) or die('Error querying database.');
 
   //$resultsArray = array();
   ?>
   {
    cols: [
        { id: 'A', label: 'Balance', type: 'number' },
        { id: 'B', label: 'Date', type: 'string' }
    ],
    rows: [
    <?php

   while ($row = mysqli_fetch_array($result)){
    //$resultsArray[] = array(
        //'Id' => $row["Id"],
        //'TDate' => $row["TDate"],
        //'Balance' => $row["Balance"]
        echo '{
            c: [{ v: ' . $row["Balance"] . ' },
                { v: ' . $row["TDate"] . ' }                
            ]
        },';
        //echo $row["Balance"] .', ';
        //echo $row["TDate"] . '</br>';
        //); 
    //);
    
    };
    ?>
        ],

   }



  


