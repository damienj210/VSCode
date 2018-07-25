<?php
include_once "dbconn/variables.php";
$db = mysqli_connect($server,$user,$pass,$table)
   or die('Error connecting to MySQL server.');
?>

<?php
$q = intval($_GET['q']);

$sql="SELECT * FROM Categories WHERE Id = '".$q."'";
$result = mysqli_query($db,$sql);

echo "<table>
<tr>
<th>Category</th>
<th>Type</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Category'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>



<?php
 
 $query = "SELECT * FROM Register ORDER BY Id ASC";
 $result = mysqli_query($db, $query) or die('Error querying database.');
 
 ?>
 
 <table class="table table-striped table-hover table-responsive-sm">
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
 </tr>
 </thead>
 <tbody>
 <?php
 
 
 while ($row = mysqli_fetch_array($result)) {
   echo '<tr class="divbutton">';
   echo '<td>' . $row["Id"] . '</td>';
   echo '<td>' . $row["TDate"] . '</td>';
   echo '<td>' . $row["CkNo"] . '</td>';
   echo '<td>' . $row["Description"] . '</td>';
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
   echo '<td></td>';
   echo '<td><button type="button" class="btn btn-primary btn-sm btn-hidden" id="btn' . $row["Id"] . '" data-toggle="modal" data-target="#modalEdit' . $row["Id"] . '">Edit</button>';
   echo '</tr>';
 
 }
   ?>
 
 </tbody></table>
