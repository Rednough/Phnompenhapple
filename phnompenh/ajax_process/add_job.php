<?php 

    $data = json_decode($_POST['wrapper'],true);

    include_once '../functions/database.php';

    print_r(add_job($data));
    print_r($data);