<?php
session_start();
include("reg.php");


if (isset($_SESSION["role"]) && $_SESSION["role"] == 'user') {
   
    $userId = $_SESSION["id"]; 
    $query = "SELECT * FROM person_details WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $details = mysqli_fetch_assoc($result);
    } else {
      
        echo "Not found.";
    }
} else {
    
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>

    <?php if (isset($details)): ?>
        <p>ID: <?php echo $details['id']; ?></p>
        <p>First Name: <?php echo $details['firstname']; ?></p>
        <p>Last Name: <?php echo $details['lastname']; ?></p>
        <p>Email: <?php echo $details['email']; ?></p>
        <p>Gender: <?php echo $details['gender']; ?></p>
        <p>Native: <?php echo $details['native']; ?></p>
        <p>skills: <?php echo $details['skills']; ?></p>
        <p>location: <?php echo $details['location']; ?></p>
        
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
