<?php
if (isset($_POST['add-user'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
     require_once 'dbh.inc.php';
    require_once 'function.inc.php';
    // Perform validation on the input fields

    // Implement code to add the new user to the database using the provided data

    // Redirect back to the admin page after adding the user
    header("Location: admin.html");
    exit();
} else {
    // Form not submitted, handle the error or redirect to the admin page
    header("Location: admin.html");
    exit();
}
?>
