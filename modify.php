<?php
include("reg.php");
$id = $_GET['id'];

$query = "select * from person_details where id='$id'";
$data = mysqli_query($conn,$query);


$result = mysqli_fetch_assoc($data);



$skills = isset($_POST['skills']) ;
$skills1 = explode(",",$result['skills']);

//  $location = implode(',',$_POST['location']);

$location = explode(",",$result['location']);




?>

<html>
  

  <style>
    .class{
        border-collapse:collapse;
        background-color:white;
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
  <title>Update Form</title>
  <body>
 
    <div class="class">
        <form action="#" id="formvalidation"  method="POST" enctype="multipart/form-data">
        <div class="title">
         <h1>Update Form</h1>
        </div>
      <div class="form">
        <div class="input">
          <label for="fname">FirstName:</label>
          <input type="text" value="<?php echo $result['firstname'] ?>" name="firstname"><br>
        </div>

        <div class="input">
          <label for="lname">LastName:</label>
          <input type="text" value="<?php echo $result['lastname'] ?>" name="lastname"><br>
        </div>

        <div class="input">
          <label for="email">Email:</label>
          <input type="email"  value="<?php echo $result['email'] ?>" name="email"><br>
        </div>

        <div class="input">
          <label for="password">Password:</label>
          <input type="password"  value="<?php echo $result['password'] ?>" name="password"><br>
        </div>
          
        <!-- radio button -->
        <div class="input">
          <label for="gender">Gender:</label><br>
          <input type="radio" name="gender" value="Female"
          <?php
          if($result['gender']=="Female"){
            echo "checked";
          }
          ?>
          >Female
          <input type="radio" name="gender" value="Male"
          <?php
          if($result['gender']=="Male"){
            echo "checked";
          }
          ?>
          >Male<br>
        </div>

        <!--  baseurl/$result['imag]
          <a href="">Doc</a>
         -->
        <div class="input">
        

        <input type="file"  name="uploadfile"><br><br>
        <input type="text" name="upload_img" <?php echo $result['img']?>
        >

        
        </div>  
  

        <!-- Dropdown -->
        <div class="input">
          <label for="native">Native:</label>
          <select name="native">

            <option value="Select">Select</option>

            <option value="Chennai"
            <?php
            if($result['native'] == 'Chennai'){
                echo "selected";
            }
            ?>
            >
            Chennai</option>
            <option value="Madurai"
            <?php
            if($result['native'] == 'Madurai'){
                echo "selected";
            }
            ?>
            >
            Madurai</option>
            <option value="Tirchy"
            <?php
            if($result['native'] == 'Tirchy'){
                echo "selected";
            }
            ?>
            >
            Tirchy</option>
            <option value="coimbatore"
            <?php
            if($result['native'] == 'coimbatore'){
                echo "selected";
            }
            ?>
            >
            Coimbatore</option>
            <option value="Bangalore"
            <?php
            if($result['native'] == 'Bangalore'){
                echo "selected";
            }
            ?>>Bangalore</option>
          </select>
    
            <!-- checkbox -->
          <div class="input">
            <label for="skills">Skills:</label>
            <input type="checkbox"  name="skills[]" value="Java"
            <?php 
            if(in_array("Java",$skills1)){
                echo "Checked";
            }
            ?>
            >Java 
           
            <input type="checkbox"  name="skills[]" value="CPP"
            <?php 
            if(in_array("CPP",$skills1)){
                echo "Checked";
            }
            ?>
            >cpp
           
            <input type="checkbox"  name="skills[]" value="Python"
            <?php 
            if(in_array("Python",$skills1)){
                echo "Checked";
            }
            ?>
            >python
          
            <input type="checkbox"  name="skills[]" value="NodeJs"
            <?php 
            if(in_array("NodeJs",$skills1)){
                echo "Checked";
            }
            ?>
            >nodejs
           
            <input type="checkbox"  name="skills[]" value="C"
            <?php 
            if(in_array("C",$skills1)){
                echo "Checked";
            }
            ?>
            >C
            
            <input type="checkbox"  name="skills[]" value="Javascript"
            <?php 
            if(in_array("Javascript",$skills1)){
                echo "Checked";
            }
            ?>
            >Javascript<br>
           
            <!-- multiple daatas in dropdown -->
            <div class="input">
            
              <label for="location">Preferred location:</label><br>
              
              <select name="location[]"  value="<?php echo $result['location'] ?>" multiple required="select-form-control" >
                 <option value="Madurai" 
                 <?php 
                  echo (isset($location) && in_array('Madurai', $location) ) ? "selected" : "" ;
                 ?>
                 
                 >Madurai</option>
                 <option value="Bangalore"
                 <?php 
                  echo (isset($location) && in_array('Bangalore', $location) ) ? "selected" : "" ;
                 ?>
                 >Bangalore</option>
                 <option value="Chennai"
                 <?php 
                  echo (isset($location) && in_array('Chennai', $location) ) ? "selected" : "" ;
                 ?>
                 >Chennai</option>
                 <option value="Coimbatore"
                 <?php 
                  echo (isset($location) && in_array('Coimbatore', $location) ) ? "selected" : "" ;
                 ?>
                 >Coimbatore</option>   
                 <option value="Tirchy"
                 <?php 
                  echo (isset($location) && in_array('Tirchy', $location) ) ? "selected" : "" ;
                 ?>
                 >Trichy</option>          
                 <option value="Hyderabad"<?php 
                  echo (isset($location) && in_array('Hyderabad', $location) ) ? "selected" : "" ;
                 ?>>Hyderabad</option>   
                  
              </select>
            </div>

        <div class="input">
            <input type="submit" name="submit" value="Update">   
        </div>

      </div>
    </div>  
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.f.js"></script>
    <script src="form.js"></script>
  </body>
</html>

<?php
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $native = $_POST['native'];
    $skills = $_POST['skills'];
    $skills = $_POST['skills'];
    $location = implode(',',$_POST['location']);
    $skills1 = implode(",",$skills);
  
    if(isset($_POST['native'])){
        $selected = $_POST['native'];
    }
    $file = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["temp_name"];
    $folder = "" . $file;
    move_uploaded_file("",$folder);

   
   $sql ="update person_details set firstname='$firstname',lastname='$lastname,email='$email',password='$password',gender='$gender',native='$native',skills='$native',img='$folder',location='$location' where id='$id'";
   $query = mysqli_query($conn,$sql);
  
   

   if($query){
   echo "Updated";
   }else{
     echo "Failed to submit";
   }
     
  }

?>




