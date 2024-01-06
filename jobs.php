<?php
    session_start();
    require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Post Jobs</title>
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./jobs.css">


</head>

<body>

    <?php include('includes/header.php'); ?>
<br><br><br>


  <?php

  $sql = "SELECT * FROM jobs";
    $result = mysqli_query($con, $sql);

    // Step 3: Fetch results and display in HTML
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $jobTitle = $row['title'];
        $companyName = $row['company_name'];
        $jobSalary = $row['salary'];
        
        // Step 4: Generate HTML dynamically
        echo '<div class="job-card" style="background-color: white;">';
        echo '<div class="job-details">';
        echo '<a href="jobs-view.php?id=' . $row['id'] . '" style="color: #2f3432; text-decoration: none; font-weight: bold;">' . $jobTitle . '</a>';

        echo '<p class="company-name">' . $companyName . '</p>';
        echo '<p class="job-salary">Salary: ' . $jobSalary . ' per month</p>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "No job details found.";
    }

?>

  
  
  <!-- <div class="job-card">
    <img src="job_image2.jpg" alt="Job Image" class="job-image">
    <div class="job-details">
      <h2 class="job-title">Job Title 2</h2>
      <p class="company-name">Company Name 2</p>
      <p class="job-salary">Salary: $X,XXX per month</p>
    </div>
  </div> -->

 <br><br><br>

    <?php include('includes/footer.php'); ?>



</body>
</html>