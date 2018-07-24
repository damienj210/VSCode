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
