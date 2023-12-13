<html>
    <head>
        <style>
            .err{
                color:#FF0000;
            }
            .class{
                border-collapse:collapse;
                background-color:skyblue;
                text-align:center;
                position:center;
                box-sizing:border-box;
                margin: 50px 100px;
                border :dotted;
                
                
            }
            input[type=submit]:hover{
                color:red;
            }
            .input{
                margin: 50px 100px;
            }
        </style>    
</head>
<body>

<?php
$name = $email = $comment = $gender = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr ="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["name"])){
        $nameErr = "Name field is required";
    }else{
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
    }
}
    if(empty($_POST["email"])){
        $emailErr = "Email field is required";
    }else{
    $email = test_input($_POST["email"]);
    }
    if(empty($_POST["website"])){
        $websiteErr = "";
    }else{
    $website = test_input($_POST["website"]);
    }
    if(empty($_POST["comment"])){
        $comment = "";
    }else{
    $comment = test_input($_POST["comment"]);
    }
    if(empty($_POST["gender"])){
        $genderErr = "Gender is required";
    }
    $gender = test_input($_POST["gender"]);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="class">
<h2>PHP FORM</h2>

<p><span class="err">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Name: <input type="text" name="name">
<span class="err"> * <?php echo $nameErr; ?></span>
<br><br>
E-mail: <input type="text" name="email">
<span class="err"> * <?php echo $emailErr; ?></span>
<br><br>
Website: <input type="text" name="website">
<span class="err"><?php echo $websiteErr; ?></span>
<br><br>
Comment: <textarea type="comment" rows="5" cols="60"></textarea>
<br><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<span class = "err"> * <?php echo $genderErr; ?> </span>
<br>
<br>
<input type="submit" name="submit" value="Submit">
</div>
</form>
<div class="input">
<?php
echo "Input:";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</div>
</body>
</html>