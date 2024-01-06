<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./job-create.css">

    <link rel="stylesheet" href="./header.css">



    <title>RecuirtMe</title>
   
</head>
<body>

<?php include('includes/header.php'); ?>

  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="colum">
                <div class="card">
                    <div class="card-header">
                        <h4>Post a New Job
                            <a href="post-jobs.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <br>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Job title</label> 
                                <input type="text" name="title" class="form-control" placeholder="Enter the Job Title">
                            </div>
                            <div class="mb-3">
                                <label>Job Category</label> 
                                <select id="job_category" name="job_category" class="form-control">
                                         <option value="Administration, business and management">Administration, business and management</option>
                                         <option value="Computing and ICT">Computing and ICT</option>
                                         <option value="Construction and building">Construction and building</option>
                                         <option value="Education and training">Education and training</option>
                                         <option value="Engineering">Engineering</option>
                                         <option value="Hairdressing and beauty">Hairdressing and beauty</option>
                                         <option value="Manufacturing and production">Manufacturing and production</option>
                                         <option value="Print and publishing, marketing and advertising">Print and publishing, marketing and advertising</option>
                               </select>

                            </div>
                           <div class="mb-3">
                                <label>Job Role</label>
                                <input type="text" name="job_role" class="form-control" placeholder="Enter the Job Role">
                            </div>

                            <div class="mb-3">
                                <label>Job Description</label>

                                <textarea  class="form-control" name="job_description" placeholder="Describe the job in details "rows="4" cols="50" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Job Type</label>
                                <select class="form-control" name="job_type">
                                  <option value="Fulltime">Fulltime</option>
                                  <option value="Partime">Partime</option>
                                </select>

                            </div> 

                            <div class="mb-3">
                                <label>Salery</label>
                                <input type="number" name="salary" class="form-control" placeholder="Enter the Salery">
                             

                            </div> 

                            <div class="mb-3">
                                <label>Company Name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter your Company Name">
                             

                            </div> 

                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="Enter you Phone Number">
                             

                            </div> 

                            <input type="hidden" name="submit_time" id="submit_time" value="">
                            <div class="mb-3">
                                <button type="submit" name="post_job" class="btn btn-primary">Post Job</button>
                            </div>

                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>


</body>
</html>