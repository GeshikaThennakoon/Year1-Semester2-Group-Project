<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_job']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete_job']);

    $query = "DELETE FROM jobs WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Job Deleted Successfully";
        header("Location: post-jobs.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Job Not Deleted";
        header("Location: post-jobs.php");
        exit(0);
    }
}

if(isset($_POST['update_job']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $job_category = mysqli_real_escape_string($con, $_POST['job_category']);
    $role = mysqli_real_escape_string($con, $_POST['job_role']); 
    $description = mysqli_real_escape_string($con, $_POST['job_description']); 
    $job_type = mysqli_real_escape_string($con, $_POST['job_type']); 
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);


    $query = "UPDATE jobs SET title='$title', job_category='$job_category', role='$role', description='$description' , job_type = '$job_type' , salary = '$salary', company_name = '$company_name' , phone_number = '$phone_number' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Job Updated Successfully";
        header("Location: post-jobs.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Job Not Updated";
        header("Location: post-jobs.php");
        exit(0);
    }

}


if(isset($_POST['post_job'])) 
{
    $userId = $_SESSION['usersId'];

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $job_category = mysqli_real_escape_string($con, $_POST['job_category']);
    $role = mysqli_real_escape_string($con, $_POST['job_role']); 
    $description = mysqli_real_escape_string($con, $_POST['job_description']); 
    $job_type = mysqli_real_escape_string($con, $_POST['job_type']); 
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);


 
    $submitTime = date('Y-m-d H:i:s');


    $query = "INSERT INTO jobs (title,job_category,role,description,job_type,submit_time,salary,company_name,phone_number,user_id) VALUES ('$title','$job_category','$role','$description','$job_type','$submitTime','$salary','$company_name','$phone_number','$userId')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Job Created Successfully";
        header("Location: job-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Job Not Created";
        header("Location: job-create.php");
        exit(0);
    }
}



if(isset($_POST['delete_applicant']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete_applicant']);

    $query = "DELETE FROM applicants WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Applicants Deleted Successfully";
        header("Location: post-jobs.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Applicants Not Deleted";
        header("Location: post-jobs.php");
        exit(0);
    }
}

?>