<?php

include_once "dbconn/variables.php";

 $db = mysqli_connect($server,$user,$pass,$table)
  or die('Error connecting to MySQL server.');
////////////////////////////////////////////////////////////////////////////////////////////////////
/////Recalculate Balances //////////////////
// Begin Update record 
?>
 <table>
 <thead>
 <tr>
 <th>ID#</th>
 <th>Transaction Date</th>
 <th>Check No</th>
 <th>Description</th>
 <th>Category</th>
 <th>Debit</th>
 <th>Deposit</th>
 <th>Balance</th>
 <th>Recalculated Balance</th>
 </tr>
 </thead>
 <tbody>

<?php

$PrevBalance = 0;

$query = "SELECT * FROM Register";
 $result = mysqli_query($db, $query) or die('Error querying database.');
 while ($row = mysqli_fetch_array($result)) {
     $RecalculatedBalance = $PrevBalance + $row["Credit"] + $row["Debit"];
     $PrevBalance = $RecalculatedBalance;
     $Id = $row["Id"];
    echo '<tr>';
    echo '<td>' . $row["Id"] . '</td>';
    echo '<td>' . $row["TDate"] . '</td>';
    echo '<td>' . $row["CkNo"] . '</td>';
    echo '<td>' . $row["tD"] . '</td>';
    echo '<td>' . $row["Category"] . '</td>';
   if ($row["Debit"] == "0.00") {
     echo '<td class="text-danger"></td>';
   }
   else {
    echo '<td class="text-danger">' . $row["Debit"] . '</td>';
   }
    if ($row["Credit"] == "0.00") {
    echo '<td></td>';
   }
   else {
    echo '<td>' . $row["Credit"] . '</td>';
   }
    echo '<td>' . $row["Balance"] . '</td>';
    echo '<td>' . $RecalculatedBalance . '</td>';
    echo '<td>';
    $recalculate_query = "UPDATE Register SET Balance='$RecalculatedBalance' WHERE Id ='$Id'";
    
    if (mysqli_query($db, $recalculate_query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
    echo '</td>';
    echo '<td>';
    echo $recalculate_query;
    echo '</td>';
    echo '</tr>';
 }




// End Update record


//////////RETURN TO REFERRING PAGE////////////////

if(isset($_SERVER["HTTP_REFERER"])){
   header("Location: {$_SERVER["HTTP_REFERER"]}");
}
?>
</tbody></table>

