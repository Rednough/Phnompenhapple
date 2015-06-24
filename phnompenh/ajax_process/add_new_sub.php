<?php

    $data = json_decode($_POST['sub_data'],true);

    include_once '../functions/database.php';

    $flag =  add_subcategory($data);
    echo $flag;
