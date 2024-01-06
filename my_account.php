
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="my_accounts.css">
  <title>My account</title>
</head>
<body>


    <section>   
        <div class="form-box">
       
            <div class="form-value">
           
                <form action="">
                <button class="back"><a href="index.php" style="color:black;">Home</a></button>
                     <h2>My Account</h2>
                     <h3 class="h3"><u>Your personal details</u></h3><br>
                    
                    <?php
                    session_start();
                    require "/xampp/htdocs/WebsiteFinal/jaith/include/dbh.inc.php";
                    
                   $sessionemail = $_SESSION['email']; // get the email that enter in login
        

                   $sql_new = "SELECT * FROM users where usersEmail = '$sessionemail'";  // get data from database
                   $result = mysqli_query($con, $sql_new);
   
                   // Check if the query was successful
                   if ($result) {
                       
                       $row = mysqli_fetch_assoc($result); 
                       
                       // Display the data
                     // Display the data with CSS styling
                    echo "<p><span class='label'>First Name : " . $row['usersFName'] . "</span></p><br>";
                    echo "<p><span class='label'>Last Name : " . $row['userLName'] . "</span></p><br>";
                    echo "<p><span class='label'>Email : " . $row['usersEmail'] . "</span></p><br>";
                    echo "<p><span class='label'>Phone Number : " . $row['userPhonenumber'] . "</span></p><br>";

                      
                   } else {
                       // display an error message,if faield
                       echo "Error: " . mysqli_error($con);
                   }
                
                
                   // Close the database connection
                   mysqli_close($con);

                   ?>
                   <Button class="Viewbutton"><a style="color: black;" href="post-jobs.php">view Application</a></Button> &nbsp; &nbsp; &nbsp; &nbsp;
                   <Button class="Changebutton"><a style="color: black;" href="change_password.page.php">Change Password</a></Button><br><br>
                   <Button class="loginbutton"><a style="color: white;" href="login.php">Log Out</a></Button>
                   
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
