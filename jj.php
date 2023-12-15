<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
   // print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileTxt = explode(".",$fileName);
    $fileActualTxt = strtolower(end($fileTxt));

    $allowed = array('jpg','jpeg','png','pdf');

    if(in_array($fileActualTxt,$allowed)){
        if($fileError === 0){
            if($fileSize<1000000){
                $fileNameNew = uniqid('',true).".".$fileActualTxt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination );
                header("location:fileupload.php?UploadedSuccess");

            }else{
                echo "too large";
            }

        }else{
            echo "cannot fileerror";
        }

    }else{
        echo "cannot upload";
    }
}
$sql = "insert into image(image)values($fileDestination)";
$query = mysqli_query($conn,$sql);


if($query){
    echo "<script>alert('Succesfull');</script>";
    }else{
      echo "Failed to submit";
    }
?>