<?php
    require_once('list.php');
    require_once("../" . getUrl('db'));
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $productId = $_POST['like'];
        $userId = $_SESSION['id'];
        $db = new DBmanager();
        $db->conect();
        $query ="INSERT INTO liked (user_id,product_id) VALUES ('$userId', '$productId');";
        $result = $db->query($query);
        header ( 'Location: '. '../' . getUrl('home') . "#$productId" );
        exit();
    }
?>
