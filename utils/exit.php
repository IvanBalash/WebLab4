<?php
require_once(__DIR__ . '/list.php');
session_start();
if($_SERVER['REQUEST_METHOD']==="POST"){
    session_destroy();
}
header ( 'Location: '. '../' . getUrl('home') );  // перенаправление на нужную страницу
exit();
