<?php
 session_start();
include("reg.php");
// include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    //$password = $_POST["password"];
    $password = trim($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

   
    $query = "SELECT * FROM person_details WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "$password";

        if (password_verify($password,  $row['password'])) {
          
            $_SESSION["role"] = $row['role'];

            if ($row['role'] == 'user') {
                header("Location: index.php"); 
            } elseif ($row['role'] == 'admin') {
                header("Location: table.php"); 
            } else {
                echo "Invalid username and password";
            }

            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid email or password";
    }
}
?>

<html>
<head>
    <style>
        .class {
            border-collapse: collapse;
            background-color: white;
            position: absolute;
            box-sizing: border-box;
            margin: 30px 250px;
            padding: 50px;
            border-style: solid;
        }
        
        .title {
            text-align: center;
        }
        
        .input {
            padding: 20px 20px;
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
