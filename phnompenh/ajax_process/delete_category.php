<?php

    include_once '../functions/database.php';

    $id = $_POST['id'];
    
    $result = delete_category($id);
    echo $result;