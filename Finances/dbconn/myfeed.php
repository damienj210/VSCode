<?php

function get_data(){
	include_once "variables.php";
   $db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
   $query = "SELECT * FROM Register";
   mysqli_query($db, $query) or die('Error querying database.');
   $result = mysqli_query($db, $query);
   //$row = mysqli_fetch_array($result);
   mysqli_close($db);
   $event_data = array();
   while ($row = mysqli_fetch_array($result)) {
	   if ($row["Debit"] < 0) {
		   $Amt = $row["Debit"] . " - Debit";
		   $color = "";
	   }
	   else {
		   $Amt = $row["Credit"] . " - Credit";
		   $color = "Green";
	   };
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
	   'id' => $row["RecurID"]
	   );
   }
   return json_encode($event_data);
}

//echo '<pre>';
print_r(get_data());
//echo '</pre>';
?> 
