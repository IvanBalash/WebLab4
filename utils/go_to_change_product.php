<?php
    require_once('list.php');
    require_once("../" . getUrl('db'));
    session_start();
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $_SESSION['productId'] = $_GET['chn'];
        header ( 'Location: '. '../' . getUrl('changeProduct'));
        exit();
    }
?>
