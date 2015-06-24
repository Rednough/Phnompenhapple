<?php 

    $data = json_decode($_POST['data'],true);
        

    if($data == 'dashboard-admin.php'){
        include_once '../pages/main-dashboard.php';
    }else if($data == '?page=pending_job_post'){
        include_once '../pages/pending-job-post.php';
    }else if($data == '?page=job_post'){
        include_once '../pages/jobpost.php';
    }else if($data == '?page=job_category'){
        include_once '../pages/jobcat.php';
    }else if($data == '?page=new_job_post'){
        include_once '../pages/new-job-post.php';
    }else if($data == '?page=registered-applicant'){
        include_once '../pages/registered-applicant.php';
    }else if($data == '?page=unregistered-applicant'){
        include_once '../pages/unregistered-applicant.php';
    }else if($data == '?page=pending-employer'){
        include_once '../pages/pending-employer.php';
    }else if($data == '?page=approved-employer'){
        include_once '../pages/approved-employer.php';
    }else if($data == '?page=log-reports'){
        include_once '../pages/log-reports.php';
    }else if($data == '?page=users-list'){
        include_once '../pages/users-list.php';
    }else{
        include_once '../pages/main-dashboard.php';
    }
?>