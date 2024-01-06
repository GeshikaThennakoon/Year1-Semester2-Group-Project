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


    <title>RecuirtMe</title>
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./post-jobs.css">



</head>


<body>

    <?php include('includes/header.php'); ?>

    <?php include('message.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="cardheader">
                        <h4 class="h4-tag">My Jobs</h4>
                        <a href="job-create.php" class="newjbutton">Post a New Job</a>


                    </div>
                    <br>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job ID</th>
                                    <th>Job Titel</th>
                                    <th>Company Name</th>
                                    <th>Posted Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $userId = $_SESSION['usersId'];

                                $query = "SELECT * FROM jobs WHERE user_id='$userId'";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $jobs) {
                                ?>
                                        <tr>
                                            <td><?= $jobs['id']; ?></td>
                                            <td><?= $jobs['title']; ?></td>
                                            <td><?= $jobs['company_name']; ?></td>
                                            <td><?= $jobs['submit_time']; ?></td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="job-view.php?id=<?= $jobs['id']; ?>" class="actionbutton">View</a>
                                                    <a href="job-edit.php?id=<?= $jobs['id']; ?>" class="actionbutton">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_job" value="<?= $jobs['id']; ?>" class="actionbutton2">Delete</button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="cardheader">
                        <h4 class="h4-tag">Applications List</h4>


                    </div>
                    <br>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job ID</th>
                                    <th>Applicant Name</th>
                                    <th>Applicant Phone Number</th>
                                    <th>Applicant Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT job_id FROM applicants";
                                $result = mysqli_query($con, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    $jobs = array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $jobId = $row['job_id'];

                                        $query_applicants = "SELECT * FROM applicants WHERE job_id = '$jobId'";
                                        $query_run_applicants = mysqli_query($con, $query_applicants);

                                        if (mysqli_num_rows($query_run_applicants) > 0) {
                                            foreach ($query_run_applicants as $applicant) {
                                ?>
                                                <tr>
                                                    <td><?= $applicant['job_id']; ?></td>
                                                    <td><?= $applicant['Name']; ?></td>
                                                    <td><?= $applicant['phone']; ?></td>
                                                    <td><?= $applicant['Email']; ?></td>
                                                    <td>
                                                        <div class="buttons">
                                                        <a href="applicant-view.php?id=<?= $applicant['id']; ?>" class="actionbutton">View</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_applicant" value="<?= $applicant['id']; ?>" class="actionbutton2">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                <?php
                                            }
                                        } else {
                                            echo "<h5>No Record Found</h5>";
                                        }
                                    }
                                } else {
                                    echo "<h5>No Applicants Found</h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>



</body>

</html>