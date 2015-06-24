<?php

    
    $id = json_decode($_POST['data'],true);
    
    include_once('../functions/ajax_retrieve.php');
    
        $subcategories = retrieve_subcategory($id);

    echo json_encode($subcategories);
?>