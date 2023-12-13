<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from stud_details limit 2 offset 1";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "id: " . $row["id"]. " <br> Name: " . $row["name"]. "<br> Location: " . $row["location"]. "<br>";
    }
}else{
    echo "0 results";
}




$conn->close();
?>