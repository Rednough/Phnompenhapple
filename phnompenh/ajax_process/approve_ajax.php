<?php


    include_once('../functions/database.php');
    $data = $_POST['data'];
    
    foreach($data as $d){
        if(update_job($d)){
            echo true;
        }else false;
    }