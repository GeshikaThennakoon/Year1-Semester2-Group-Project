<?php
// Check if the form is submitted
if (isset($_POST['reset-request-submit'])) {
    // Retrieve the email entered by the user
    $email = $_POST['email'];

    // Validate the email address
    if (empty($email)) {
        header("Location: forgot_password.php?error=emptyfields");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: forgot_password.php?error=invalidemail");
        exit();
    }

    // Generate a unique token
    $token = bin2hex(random_bytes(8));

    // Store the token and associated email in the database for password reset verification

    // Database credentials
    $servername = "localhost";
    $username = "jaith";
    $password = "Il99C8Y(q(wW!QIt";
    $dbname = "login";

    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Prepare the SQL statement
    $sql = "INSERT INTO user_reset_tokens (email, token) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the statement
    $stmt->execute([$email, $token]);

    // Check if the query was successful
    if ($stmt->rowCount() > 0) {
        // Send the password reset email to the user
        $to = $email;
        $subject = "Password Reset";
        $message = "Dear user,\n\nYou have requested to reset your password. Please click the link below to reset your password:\n\n";
        $message .= "Reset Link: http://yourwebsite.com/reset_password.php?email=" . urlencode($email) . "&token=" . $token . "\n\n";
        $message .= "If you did not request a password reset, please ignore this email.\n\n";
        $message .= "Best regards,\nYour Website";
        $headers = "From: Your Website <noreply@yourwebsite.com>\r\n";
        $headers .= "Reply-To: noreply@yourwebsite.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $message, $headers)) {
            // Email sent successfully
            header("Location: forgot_password.php?reset=success");
            exit();
        } else {
            // Error in sending email
            header("Location: forgot_password.php?error=mailsend");
            exit();
        }
    } else {
        // Error in database query
        header("Location: forgot_password.php?error=dberror");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>

    <?php
    // Check for errors or success messages and display appropriate messages
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo "<p>Please enter your email address.</p>";
        } elseif ($_GET['error'] == "invalidemail") {
            echo "<p>Please enter a valid email address.</p>";
        } elseif ($_GET['error'] == "mailsend") {
            echo "<p>There was an error sending the email. Please try again later.</p>";
        } elseif ($_GET['error'] == "dberror") {
            echo "<p>There was an error in processing your request. Please try again later.</p>";
        }
    } elseif (isset($_GET['reset'])) {
        if ($_GET['reset'] == "success") {
            echo "<p>An email with instructions to reset your password has been sent to your email address.</p>";
        }
    } else { 
        echo "<p>Please enter your email address to receive a password reset link.</p>";
    }
    ?>

    <form action="forgot_password.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="reset-request-submit">Reset Password</button>
    </form>
</body>
</html>
