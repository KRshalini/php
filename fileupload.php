
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "details";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn) {
  echo "Connection Success";
}else{
    echo "Connection failed .mysqli_connect_error";
}
?>
<html>
    <h1>Upload</h1>
<body>
    <form action="jj.php" method="POST" enctype="multipart/form-data">
   <input type="file" name="file">
   <button type="submit" name="submit">UPLOAD</button>
</form>
</body>


</html>

