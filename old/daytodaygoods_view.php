<?php
  session_start();

  if ($_SESSION['is_logged_in'] == 0) {
    header("Location:login.php");
    die();
    }
?>
<input type=button onClick="location.href='logout.php'" value='Logout' style='float: right;'>

<?php
$con = mysql_connect("localhost","root","iiit123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("postnoon", $con);

$result = mysql_query("SELECT * FROM D2D_Goods");

echo "<table border='1'>
<tr>
<th>Type</th>
<th>Date</th>
<th>Cost</th>
<th>Bought By</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Type'] . "</td>";
  echo "<td>" . $row['Date'] . "</td>";
  echo "<td>" . $row['Cost'] . "</td>";
  echo "<td>" . $row['Bought_By'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?> 




