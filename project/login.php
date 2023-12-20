<html>
<head>
    <style>
        .class {
            border-collapse: collapse;
            background-color: white;
            position: center;
            box-sizing: border-box;
            margin: 10px 300px;
            padding: 50px 50px;
            border-style: solid;
        }
        
        .title {
            text-align: center;
        }
        
        .input {
            padding: 20px 0px;
        }
    </style>
</head>
<body>
    <div class="class">
        <form action="#" id="formvalidation" method="POST" enctype="multipart/form-data">
            <div class="title">
                <h1>LOGIN</h1>
            </div>

            <div class="input">
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
            </div>

            <div class="input">
                <label for="password">Password:</label>
                <input type="password" name="password" required><br>
            </div>
        

            <div class="input">
                <input type="submit" name="login" value="Login">   
            </div>
        </form>
    </div>
</body>
</html>

<?php
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "details";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM person_details WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row["password"])) {
           
            $_SESSION['role'] = $row["role"];

            
            if ($_SESSION['role'] == "admin") {
                header("location: table.php");
                exit();
            } elseif ($_SESSION['role'] == "user") {
                header("location: form1.php");
                exit();
            } else {
                echo "Invalid role";
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
} else {
   
?>

<?php
}
?>