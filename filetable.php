<?php
include("reg.php");

$query = "select * from image";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

//echo $total;

if($total != 0){
    ?>
  <table>
    <th>Image</th>
     
     <th>Edit/Delete</th>
     
    
    <?php
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
        <td>".$result['image']."</td>
        

        <td><a href='filemodify.php?image=$result[image]'>Edit</a>
       </td>

        </tr>
        ";
        
    }
  
}else{
    echo "No records";
}
?>
</table>