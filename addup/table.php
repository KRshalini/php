<?php
include("reg.php");
include("db.php");
$query = "SELECT * FROM person_details";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);



$query_country = "SELECT * FROM country";
$data_country = mysqli_query($con, $query_country);
$total_country = mysqli_num_rows($data_country);

$query_state= "SELECT * FROM state";
$data_state = mysqli_query($con, $query_state);
$total_state = mysqli_num_rows($data_state);

$query_city= "SELECT * FROM city";
$data_city = mysqli_query($con, $query_city);
$total_city = mysqli_num_rows($data_city);

//echo $total;

if ($total != 0) {
    ?>
    <table>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Native</th>
        <th>Skills</th>
        <th>Country</th>
        <th>state</th>
        <th>city</th>
        <th>Images</th>
        <th>Location</th>
        <th>Edit/Delete</th>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            while ($result_1 = mysqli_fetch_assoc($data_country))
            {
                if($result['country']==$result_1['id'])
                {
                    $country=$result_1['name'];
                }
            }
            while ($result_2 = mysqli_fetch_assoc($data_state))
            {
                if($result['state']==$result_2['id'])
                {
                    $state=$result_2['state'];
                }
            }
            while ($result_3 = mysqli_fetch_assoc($data_city))
            {
                if($result['city']==$result_3['id'])
                {
                    $city=$result_3['city'];
                }
            }

           
            echo "<tr>
            <td>" . $result['id'] . "</td>
            <td>" . $result['firstname'] . "</td>
            <td>" . $result['lastname'] . "</td>
            <td>" . $result['email'] . "</td>
            <td>" . $result['password'] . "</td>
            <td>" . $result['gender'] . "</td>
            <td>" . $result['native'] . "</td>
            <td>" . $result['skills'] . "</td>
            <td>".$country."</td> 
            <td>".$state."</td>
            <td>".$city."</td>
            <td><img src='data:image/*;base64," . base64_encode($result['image']) . "' alt='Image' style='max-width: 100px; max-height: 100px;'></td>
            <td>" . $result['location'] . "</td>

            <td>
                <a href='modify.php?id=$result[id] & firstname=$result[firstname] & lastname=$result[lastname] & email=$result[email] & password=$result[password] & gender=$result[gender] & native=$result[native] & skills=$result[skills] &country=$country &state=$state &city=$city & location=$result[location]'>Edit</a>
                <a href='delete.php?id=$result[id]'>Delete</a>
            </td>

            </tr>";
        }
        ?>
    </table>
<?php
} else {
    echo "No records";
}
?>
