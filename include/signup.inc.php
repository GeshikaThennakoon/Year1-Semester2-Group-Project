<?php

// if (isset($_POST["submit"])) {
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pwd = $_POST["pwdA"];
    $cpwd = $_POST["confirmPassword"];

echo "$fname  $lname ";
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    $emptyInputs = emptyInputsSignup($fname, $lname, $phone, $email, $pwd, $cpwd);
    $invalidfname = invalidfirstname($fname);
    $invalidlname = invalidlname($lname);
    $invalidphone = invalidphone($phone);
    $invalidemail = invalidemail($email);
    $pwdMatch = pwdMatch($pwd, $cpwd);
    $uidExists = uidExists($con, $email);

    if ($emptyInputs) {
        header("Location: ../signup.php?error=emptyinputs");
        exit();
    }
    if ($invalidfname) {
        header("Location: ../signup.php?error=invalidfname");
        exit();
    }
    if ($invalidlname) {
        header("Location: ../signup.php?error=invalidlname");
        exit();
    }
    if ($invalidphone) {
        header("Location: ../signup.php?error=invalidphone");
        exit();
    }
    if ($invalidemail) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    if ($pwdMatch) {
        header("Location: ../signup.php?error=passwordDoseNotMatch");
        exit();
    }
    if ($uidExists) {
        header("Location: ../signup.php?error=emailExists");
        exit();
    }

    session_start();
$_SESSION['usersId'] = $usersId;
  
    createUser($con, $fname, $lname, $phone, $email, $pwd);
//  } else {
    header('Location: ../login.php');
//  }
