<?php

function get_data(){
	include_once "variables.php";
   $db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
   $query = "SELECT * FROM Future";
   mysqli_query($db, $query) or die('Error querying database.');
   $result = mysqli_query($db, $query);
   //$row = mysqli_fetch_array($result);
   mysqli_close($db);
   $event_data = array();
   while ($row = mysqli_fetch_array($result)) {
	   if ($row["Debit"] < 0) {
		   $Amt = $row["Debit"] . " - Debit";
		   $color = "#FFB833";
	   }
	   else {
		   $Amt = $row["Credit"] . " - Credit";
		   $color = "#DAF7A6";
       };
       $recurrence = $row["Recur"];
       $recurrencePattern = $row["Recurrence"];
       if ($recurrence === "1"){
            //echo "Recurrence = True     ";
            //echo $recurrencePattern . "</br>";
            //print_r(explode(',',$recurrencePattern));
            $pattern = explode(',', $recurrencePattern);
            $occurrences = $pattern['7'];
            //$i = 1;
            $stDate = strtotime($row["TDate"]);
            $enddate=strtotime("+".$occurrences." weeks", $stDate);
            while ($stDate < $enddate) {
              $occurDate = date("Y-m-d", $stDate);
                
              $event_data[] = array(
                'title' => $row["tD"],
                'start' => $occurDate,
                //'start' => $row["TDate"] + (7*$i),
                'color' => $color,
                'amt' => $Amt,
                'Id' => $row["Id"],
                'Account' => $row["Account"],
                'TDate' => $row["TDate"],
                'PDate' => $row["PDate"],
                'CkNo' => $row["CkNo"],
                'tD' => $row["tD"],
                'Debit' => $row["Debit"],
                'Credit' => $row["Credit"],
                'Category' => $row["Category"],
                'id' => $row["Id"],
                'Balance' => $row["Balance"],
                'Recur' => $row["Recur"],
                'Recurrence' => $row["Recurrence"]
                );
                $stDate = strtotime("+1 week", $stDate);
            }
            

       }
       else {
	   $event_data[] = array(
	   'title' => $row["tD"],
	   'start' => $row["TDate"],
	   'color' => $color,
	   'amt' => $Amt,
	   'Id' => $row["Id"],
	   'Account' => $row["Account"],
	   'TDate' => $row["TDate"],
	   'PDate' => $row["PDate"],
	   'CkNo' => $row["CkNo"],
	   'tD' => $row["tD"],
	   'Debit' => $row["Debit"],
	   'Credit' => $row["Credit"],
	   'Category' => $row["Category"],
	   'id' => $row["Id"],
       'Balance' => $row["Balance"],
       'Recur' => $row["Recur"],
       'Recurrence' => $row["Recurrence"]
       );
       }
   }
   return json_encode($event_data);
}

//echo '<pre>';
print_r(get_data());
//echo '</pre>';
?> 
