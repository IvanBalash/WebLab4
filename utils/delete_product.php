<?php
    require_once('list.php');
    require_once("../" . getUrl('db'));
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $id = $_POST['del'];
        $db = new DBmanager();
        $db->conect();
        $query ="DELETE FROM products WHERE id = $id";
        $result = $db->query($query);
        header ( 'Location: '. '../' . getUrl('home'));
        exit();
    }
?>
