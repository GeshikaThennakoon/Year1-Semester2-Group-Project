<?php
// Include the necessary files
require_once 'dbh.inc.php';

// Check if the user ID is provided
if (isset($_GET['userId'])) {
    // Retrieve the user ID from the URL parameter
    $userId = $_GET['userId'];

    // Prepare the SQL statement to delete the user
    $sql = "DELETE FROM users WHERE usersId = ?";
    $stmt = mysqli_stmt_init($con);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind the parameter and execute the statement
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        // Close the statement and database conection
        mysqli_stmt_close($stmt);
        mysqli_close($con);

        // Redirect back to the admin dashboard or any other page
        header("Location: admin.php?delete=success");
        exit();
    } else {
        // Handle any errors
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        header("Location: admin.php?error=sqlerror");
        exit();
    }
} else {
    // Redirect back to the admin dashboard or any other page
    header("Location: admin.php");
    exit();
}
?>
