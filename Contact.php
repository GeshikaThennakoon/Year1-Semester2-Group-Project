<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Contact.css">
    <link rel="stylesheet" href="./header.css">
</head>
<body>

<?php include('includes/header.php'); ?>
<div class="contactcard">


<div class="wrapper">
    <form action="AddContact.php" method="post">
        <h1>Contact Us Form</h1>
        <input type="text" name="Name" placeholder="Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="contact_Number" placeholder="Contact Number" required>
        <h4>Type Your Message Here...</h4>
        <textarea name="message"></textarea>
        <button type="submit" name="submit" > Send</button>
</form>
</div>

</div>
</div>
</div>

<?php include('includes/footer.php'); ?>

    
</body>
</html>

