<?php
require 'dbcon.php';
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

        <div class="row">
            <div class="colum">
                <div class="card">
                    <div class="card-header">
                        <h4>Job Details 
                            <a href="post-jobs.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <br>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM jobs WHERE id='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $jobs = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Job Title</label>
                                        <p class="form-control">
                                            <?=$jobs['title'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Job Category</label>
                                        <p class="form-control">
                                            <?=$jobs['job_category'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Job Role</label>
                                        <p class="form-control">
                                            <?=$jobs['role'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Job Description</label>
                                        <p class="form-control">
                                            <?=$jobs['description'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Job Type</label>
                                        <p class="form-control">
                                            <?=$jobs['job_type'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Salery</label>
                                        <p class="form-control">
                                            <?=$jobs['salary'];?>
                                        </p>
                                    </div>

                                    

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    
</body>
</html>