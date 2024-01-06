<?php
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecuirtMe</title>
    <link rel="stylesheet" href="./apply-now.css">
    <link rel="stylesheet" href="./header.css">

</head>
<body>

<?php include('includes/header.php'); ?>


<div class="full_body">
   <div class="topic">

   <h1 class="h1">Application form</h1><br>


   <?php
                        
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM jobs WHERE id='$id' ";
                            $query_run = mysqli_query($con, $query);

                                $jobs = mysqli_fetch_array($query_run);
                                ?>
                                
                                  
            
   </div>
    <div class="input_body">

    
        <form action="applynow-code.php"  method="POST"  enctype="multipart/form-data">
            <div class="get_inputs">

            <P>Name :<p>
            <input type="text" class="text_box" id="Name" name="Name" placeholder="Enter your name with initials" required ><br><br>

            <P>Address :<p>
            <input type="text" class="text_box" id="Address" name="Address" placeholder="Enter your Address" required><br><br>

            <P>Phone Number :<p>
            <input type="number" class="text_box" id="Phone_number" name="Phone_number" placeholder="0xx - xxx xxxx" required><br><br>

            <P>E-mail :<p>
            <input type="email" class="text_box" id="Email" name="Email" placeholder="Enter valied E-mail (xxxx@gmail.com)" required><br><br>

            <P>Upload Resume :<p>
            <input type="file" class="Upload_Resume" name="Upload_Resume" id="Upload_Resume" required ><br><br>
            <input type="hidden" name="job_id" value="<?= $jobs['id']; ?>">

  
            <input type="submit" class="submit" name="submit" value="submit">

            </div>
        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?>



    
</body>
</html>


