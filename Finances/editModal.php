<?php
function get_data(){
include_once "dbconn/variables.php";
$db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');


//q is the Id of the record to edit;
 $q = intval($_GET['q']);

 $query = "SELECT * FROM Register WHERE Id = " . $q;
 $result = mysqli_query($db, $query) or die('Error querying database.');
 mysqli_close($db);
 $event_data = array();
 while ($row = mysqli_fetch_array($result)) {
  $event_data[] = array(
    'Id' => $row["Id"],
    'Account' => $row["Account"],
    'TDate' => $row["TDate"],
    'PDate' => $row["PDate"],
    'CkNo' => $row["CkNo"],
    'tD' => $row["tD"],
    'Debit' => $row["Debit"],
    'Credit' => $row["Credit"],
    'Category' => $row["Category"]
    );
  }
 
 return json_encode($event_data);

}

//echo '<pre>';
print_r(get_data());
//echo '</pre>';

?>
