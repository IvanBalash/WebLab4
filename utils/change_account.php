<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $err = new ErrorsCollector();
    $id = $_SESSION['id'];
    $errMessage = "";
    $db = new DBmanager();
    $db->conect();
    if(!empty($_POST['name-input'])){
        $newName =$_POST['name-input'];
        $query = "UPDATE users SET name = '$newName' WHERE users.id = '$id';";
        if($db->query($query)){
            $_SESSION['name'] = $newName;
        }
        else{
            $err->addError("Не получилось обновить имя");
        }
    }
    if(!empty($_POST['oldPass'] )){
        $oldPass = $_POST['oldPass'];
        if($_POST['login-input']!==$_SESSION['login']){
            $newLogin =$_POST['login-input'];
            $query ="SELECT * FROM users WHERE login = '$newLogin';";
            $result = $db->query($query);
            if($result->num_rows == 1){
                $err->addError("Логин занят");
            }
            else{
                $query ="SELECT * FROM users WHERE id = '$id';";
                $result = $db->query($query);
                $row = $result->fetch_array();
                if($row["password"] === md5($oldPass . "spider_man")) {
                    $query = "UPDATE users SET login = '$newLogin' WHERE users.id = '$id';";
                    if ($db->query($query)) {
                        $_SESSION['login'] = $newLogin;
                    } else {
                        $err->addError("Не получилось обновить логин");
                    }
                }
                else{
                    $err->addError("Не верный пароль");
                }
            }
        }
        if(!empty($_POST['newPass'])){
            $newPass = md5($_POST['newPass'] . "spider_man");
            $query ="SELECT * FROM users WHERE id = '$id';";
            $result = $db->query($query);
            $row = $result->fetch_array();
            if($row["password"] === md5($oldPass . "spider_man")){
                $query = "UPDATE users SET password = '$newPass' WHERE users.id = '$id';";
                if ($db->query($query)) {
                    $_SESSION['password'] = $newPass;
                } else {
                    $err->addError("Не получилось обновить пароль");
                }
            }
            else{
                $err->addError("Не верный пароль");
            }

        }
    }
    else{
        if($_POST['login-input']!==$_SESSION['login'] || !empty($_POST['newPass'])) {
            $err->addError("Для смены логина или пароля введите старый пароль");
        }
    }
    $errMessage = implode("<br/>",$err->getErrors());

}
?>
