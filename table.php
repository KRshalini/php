<?php
include("reg.php");

$query = "select * from person_details";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

//echo $total;

if($total != 0){
    ?>
  <table>
     <th>FirstName</th>
     <th>LastName</th>
     <th>Email</th>
     <th>Password</th>
     <th>Gender</th>
     <th>Native</th>
     <th>Skills</th>
     <th>Image</th>
     <th>Location</th>
     <th>Edit/Delete</th>
     
    
    <?php
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
        <td>".$result['firstname']."</td>
        <td>".$result['lastname']."</td>
        <td>".$result['email']."</td>
        <td>".$result['password']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['native']."</td>
        <td>".$result['skills']."</td>
        <td>".$result['img']."</td>
        <td>".$result['location']."</td>
        <td><a href='form1.php?'>Edit</a></td>
        </tr>";
    }
  
}else{
    echo "No records";
}
?>
</table>
