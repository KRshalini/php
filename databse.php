<?php
  if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $native = $_POST['native'];

    if(isset($_POST['native'])){
        $selected = $_POST['native'];
    }
    
   $sql = "insert into person_details values('$firstname','$lastname','$email','$password','$gender','$native','$skills')";
   $query = mysqli_query($conn,$sql);

   if($query){
   // echo "Successfully submitted";
   }else{
     echo "Failed to submit";
   }
     
  }

?>