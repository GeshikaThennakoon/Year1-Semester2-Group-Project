
<?php
    require 'dbcon.php';

$select_sql = "SELECT * FROM contact";
$result = $con->query($select_sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="contactus_reply.css"> 

</head>
<body>
    <h1 class="contactus_h1">Contact Data</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Message</th>
            <th>Date and Time</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td><a href='mailto:" . $row['Email'] . "'>" . $row['Email'] . "</a></td>";
                echo "<td>" . $row['Con_Number'] . "</td>";
                echo "<td>" . $row['Message'] . "</td>";
                echo "<td>" . $row['Date_Time'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found in the table.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$con->close();
?>