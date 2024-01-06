<?php
require 'dbcon.php';

if (isset($_GET['id'])) {
    $applicantId = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM applicants WHERE id = '$applicantId'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $applicant = mysqli_fetch_array($query_run);
?>
        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="./header.css">
            <link rel="stylesheet" href="./job-create.css">

            <title>RecuirtMe</title>
        </head>

        <body>

            <?php include('includes/header.php'); ?>

            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h2>Applicant Details
                                    <a href="post-jobs.php" class="btn btn-danger float-end">BACK</a>

                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <p class="form-control"><?= $applicant['Name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Address</label>
                                    <p class="form-control"><?= $applicant['Address']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <p class="form-control"><?= $applicant['phone']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <p class="form-control"><?= $applicant['Email']; ?></p>
                                </div>

                                <div class="mb-3">
                                    <label>Resume</label>
                                    <?php
                                    $resumePath = $applicant['Resume'];

                                    // Check if the resume image exists
                                    if (file_exists($resumePath)) {
                                        echo '<img src="' . $resumePath . '" alt="Resume">';
                                    } else {
                                        echo '<p>Resume not found.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('includes/footer.php'); ?>

        </body>

        </html>
<?php
    } else {
        echo "<h4>No Such Applicant Found</h4>";
    }
} else {
    echo "<h4>Invalid Applicant ID</h4>";
}
?>