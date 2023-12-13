<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"student");
$sql="SELECT * FROM employee WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>empid</th>
<th>empname</th>
<th>job</th>
<th>salary</th>
<th>branchid</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['empid'] . "</td>";
  echo "<td>" . $row['empname'] . "</td>";
  echo "<td>" . $row['job'] . "</td>";
  echo "<td>" . $row['salary'] . "</td>";
  echo "<td>" . $row['branchid'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>