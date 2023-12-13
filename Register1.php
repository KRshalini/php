<?php
 include("reg.php");
?>
<html>
  <style>
    
    .class{
        border-collapse:collapse;
        background-color:skyblue;
        position:center;
        box-sizing:border-box;
        margin: 10px 300px;
        padding:50px 50px;
        border-style:solid;

    }
    .reg{
        text-align:center;
    }
    .form{
        margin-right:0px;
    }
    .input{
        padding:20px 0px;
    }
    
    
    
  </style>
  
  <body>
  <h1 class="reg">FORM</h1>
    <div class="class">
        <form action="#" method="POST">

     

      <div class="form">
        <div class="input">
          <label for="fname">FirstName:</label>
          <input type="text" name="firstname">
        </div>

        <div class="input">
          <label for="lname">LastName:</label>
          <input type="text" name="lastname">
        </div>

        <div class="input">
          <label for="email">Email:</label>
          <input type="email" name="email">
        </div>

        <div class="input">
          <label for="password">Password:</label>
          <input type="password" name="password">
        </div>

        <div class="input">
          <label for="gender">Gender:</label>
          <input type="radio" name="gender" value="Female">Female
          <input type="radio" name="gender" value="Male">Male
        </div>

        <div class="input">
          <label for="city">City:</label>
          <input type="text" name="city">
        </div>

        <div class="input">
          <label for="skills">Skills:</label>
          <select name="skills">
            <option value="Select">Select</option>
            <option value="Java">Java</option>
            <option value="C++">C++</option>
            <option value="Python">Python</option>
            <option value="NodeJS">NodeJS</option>
            <option value="Javascript">Javascript</option>
          </select>

        <div class="input">
            <input type="submit" name="submit" value="Submit">   
        </div>

      </div>
    </div>  
    </form>
    </div>
  </body>
</html>

<?php
  if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $skills = $_POST['skills'];

    if(isset($_POST['skills'])){
        $selected = $_POST['skills'];
    }
    
   $sql = "insert into person_details values('$firstname','$lastname','$email','$password','$gender','$city','$skills')";
   $query = mysqli_query($conn,$sql);

   if($query){
   // echo "Successfully submitted";
   }else{
     echo "Failed to submit";
   }
     
  }

?>

