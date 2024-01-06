<?php
session_start();
require 'dbcon.php';

if (isset($_POST['submit'])) {
    $job_id = $_POST['job_id'];

    $name = $_POST["Name"];
    $address = $_POST["Address"];
    $phone_number = $_POST["Phone_number"];
    $email = $_POST["Email"];

    // Handle the file upload
    if ($_FILES['Upload_Resume']['size'] > 0) {
        $fileName = $_FILES['Upload_Resume']['name'];
        $tempFilePath = $_FILES['Upload_Resume']['tmp_name'];
        $resumePath = "uploads/" . $fileName;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($tempFilePath, $resumePath)) {
            // Prepare and execute the SQL query
            $stmt = $con->prepare("INSERT INTO applicants (Name, Address, phone, Email, Resume, job_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisss", $name, $address, $phone_number, $email, $resumePath, $job_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $_SESSION['message'] = "Application Sent Successfully";
                header("Location: jobs-view.php?id=" . $job_id);
                exit();
            } else {
                $_SESSION['message'] = "Application Not Sent";
                header("Location: index.php");
                exit();
            }

            $stmt->close();
        } else {
            $_SESSION['message'] = "Failed to move the uploaded file";
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "No file uploaded";
        header("Location: index.php");
        exit();
    }
}

// Close the connection
$con->close();
?>
