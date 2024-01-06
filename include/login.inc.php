<?php
session_start();

if(isset($_POST['submit'])){
$email = $_POST["email"];
$pwd = $_POST["password"];

$_SESSION['email'] = $email; // use email  for my acctount to get my details in my account

require_once 'dbh.inc.php';
require_once 'function.inc.php';

if (emptyInputsLogin($email, $pwd)) {
    exit();
}

$userData = loginUser($con, $email, $pwd);

}
if ($userData) {
    $_SESSION['usersId'] = $userData['usersId'];

    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../login.php?error=invalid_credentials');
    exit();
}
echo  $_SESSION['email'];


 ?>