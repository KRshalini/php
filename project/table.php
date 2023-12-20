<?php
include("reg.php");


$recordsPerPage = 10;


if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}


$startFrom = ($currentPage - 1) * $recordsPerPage;


$query = "SELECT * FROM person_details LIMIT $startFrom, $recordsPerPage";
$data = mysqli_query($conn, $query);


$totalQuery = "SELECT COUNT(*) AS total FROM person_details";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$total = $totalRow['total'];

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
      <!--  <th>Images</th>  -->
      <th>Role</th>
        <th>Location</th>
        <th>Edit/Delete</th>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "<tr>
            <td>" . $result['id'] . "</td>
            <td>" . $result['firstname'] . "</td>
            <td>" . $result['lastname'] . "</td>
            <td>" . $result['email'] . "</td>
            <td>" . $result['password'] . "</td>
            <td>" . $result['gender'] . "</td>
            <td>" . $result['native'] . "</td>
            <td>" . $result['skills'] . "</td>
            <td>" . $result['role'] . "</td>
            
            <td>" . $result['location'] . "</td>

            <td>
                <a href='modify.php?id=$result[id] & firstname=$result[firstname] & lastname=$result[lastname] & email=$result[email] & password=$result[password] & gender=$result[gender] & native=$result[native] & skills=$result[skills] & role=$result[role] & location=$result[location]'>Edit</a>
                <a href='delete.php?id=$result[id]'>Delete</a>
            </td>

            </tr>";
        }
        ?>
    </table>
    <div class="pagination">
        <?php
        $totalPages = ceil($total / $recordsPerPage);

        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='table.php?page=$i'>$i</a> ";
        }
        ?>
    </div>


<?php
} else {
    echo "No records";
}
?>
<!--<td><img src='data:image/*;base64," . base64_encode(isset($result['image'])) . "' alt='Image' style='max-width: 100px; max-height: 100px;'></td>
-->