<?php

function emptyInputsSignup($fname, $lname, $phone, $email, $pwd, $cpwd)
{
    if (empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($pwd) || empty($cpwd)) {
        return true;
    }

    return false;
}

function invalidfirstname($fname)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
        return true;
    }

    return false;
}

function invalidlname($lname)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        return true;
    }

    return false;
}

function invalidphone($phone)
{
    if (!preg_match("/^[0-9]*$/", $phone)) {
        return true;
    }

    return false;
}

function invalidemail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }

    return false;
}

function pwdMatch($pwd, $cpwd)
{
    if ($pwd !== $cpwd) {
        return true;
    }

    return false;
}

function uidExists($con, $email)
{
    $sql = "SELECT * FROM users WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($con, $fname, $lname, $phone, $email,  $pwd)
{
    $sql = "INSERT INTO users (usersFName, userLName, userPhonenumber, usersEmail, usersPassword) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssiss", $fname, $lname, $phone, $email, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../login.php?error=none");
    exit();
}

function emptyInputsLogin($email, $pwd)
{
    if (empty($email) || empty($pwd)) {
        return true;
    }

    return false;
}

function loginUser($con, $email, $pwd)
{
    $uidExists = uidExists($con, $email);

    if ($uidExists === false) {
        echo '<script>alert("Email or password is incorrect. Please try again."); window.location.href="../login.php";</script>';
        exit();
    }

    $pwdhashed = $uidExists["usersPassword"];
    $checkpwd = password_verify($pwd, $pwdhashed);

    if ($checkpwd === false) {
        echo '<script>alert("Email or password is incorrect. Please try again."); window.location.href="../login.php";</script>';
        exit();
    } elseif ($checkpwd === true) {
        session_start();
        $_SESSION["usersId"] = $uidExists["usersId"];
        $_SESSION["usersEmail"] = $uidExists["usersEmail"];
        
        // Check if the user is an admin
        if ($uidExists["usersEmail"] === 'Admin@gmail.com') {
            header("Location: admin.php");
            exit();
        } else {
            header("Location: ../index.php");
            exit();
        }
    }
}

