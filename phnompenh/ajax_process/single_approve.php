<?php

    include_once('../functions/database.php');
    $array = $_POST['data'];
//    print_r($_POST);
    $result = update_job($array);
    echo $result;