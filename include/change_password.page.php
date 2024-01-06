<?php
require_once "header.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change your password</title>
</head>
<body>

<form action="chanagepassword.php" method="post"> 
<input type="email" name="changeemail" placeholder="your email">
<input type="password" name="current_password" placeholder="current_password">
<input type="password" name="new_password" placeholder="new_password">
<input type="password" name="Re_enter_new_password" placeholder="Re-enter new password">
<button type="submit" name="change">change</button>
</form>
    
<?php
require_once "footer.php"
?>