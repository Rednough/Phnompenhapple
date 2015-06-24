<?php 


    function connection(){
        return new PDO('mysql:host=localhost;dbname=final;','root','');
    }

    function retrieve_subcategory($id){
        $db = connection();
        
        $sql = "select * from sub_category where category_id=?";
        $st = $db->prepare($sql);
        $st->execute(array($id));
        $result = $st->fetchAll();
        return $result;
        $db=null;
    }