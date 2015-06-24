<?php 
//    
//    $page = '';
//    $content = '';
//
//    if(isset($_GET['page'])){
//        
//        $page = $_GET['page'];
//        
//        if($page == 'job_post'){
//            $content  = "jobpost.php";
//        }else if($page == 'job_category'){
//            $content = "jobcat.php";
//        }else if($page == 'new_job_post'){
//            $content = "new-job-post.php";
//        }else if($page == 'registered-applicant'){
//            $content = "registered-applicant.php";
//        }else if($page == 'unregistered-applicant'){
//            $content = "unregistered-applicant.php";
//        }else if($page == 'pending-employer'){
//            $content = "pending-employer.php";
//        }else if($page == 'approved-employer'){
//            $content = "approved-employer.php";
//        }else if($page == 'log-reports'){
//            $content = "log-reports.php";
//        }else if($page == 'users-list'){
//            $content = "users-list.php";
//        }
//    }else{
//        $content = "main-dashboard.php";
//    }

//    print_r($_POST);
    
    if(isset($_POST['save'])){
        include_once 'functions/database.php';
        if(isset($_POST['category_id'])){
            echo "wews";
            $flag = add_subcategory($_POST);
        }else{
            echo "wew";
            $flag = add_category($_POST);
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Phnom Penh Apple</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Datatable/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="//cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/admin-css.css"/>
</head>
<body>
    
    
    <div id="wrapper">
        
        <?php include_once('includes/admin-header.php');?>
        <?php include_once('includes/admin-sidebar.php');?>
        <div id="content">
            
        </div>
        
    </div>
    
    
<?php include_once('includes/admin-footer.php'); ?>