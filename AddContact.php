<?php
    session_start();
    require 'dbcon.php';



if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['contact_Number'];
    $text = $_POST['message'];

$add_sql = "INSERT INTO contact(Name,LastName,Email,Con_Number,Message,Date_Time) VALUES ('$name','$lastName','$email','$phoneNumber','$text',NOW())";

if ($con->query($add_sql)) {
    echo "Data inserted successfully";
}
else{ 
    echo "Error:"  . $add_sql . "<br>" . $con->error;
}
}

//close the connection
$con->close();

?>