<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >

    <link rel="stylesheet" href="styles/cabinet_style.css_style.css" >

    <title><?php if(isset($_SESSION['id'])){
            echo $_SESSION['name'];
        }
        else{
            echo "shop";
        }?></title>
</head>
<body>
<div id="frame">
    <header>
        <?php require_once('header.php')?>
    </header>
    <main>
        <div id="user_page_block">
            <div id="account_info">
                <h2>Информация об аккаунте:</h2>
                <div id="left_side">
                    <label for="name-input">Имя:</label>
                    <label for="login-input">Логин:</label>
                    <label for="oldPass">Пароль:</label>
                    <label for="newPass">новый пароль:</label>
                </div>
                <div>
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
                            if(!empty($_POST['login-input'])){
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
                            $err->addError("Для смены логина или пароля введите старый пароль");
                        }
                        $errMessage = implode("<br/>",$err->getErrors());

                    }
                    ?>
                    <form action="user_page.php" method="POST">
                        <input class="str_input" type="text" name="name-input" placeholder="<?php
                            echo $_SESSION['name'];
                        ?>" />
                        <input class="str_input" type="text" name="login-input" placeholder="<?php
                            echo $_SESSION['login'];
                        ?>" />
                        <input class="str_input" type="password" name="oldPass" minlength="2" />
                        <input class="str_input" type="password" name="newPass" minlength="8" />
                        <input class="sbmt_input" type="submit" value="Применить">
                        <?php
                            if(isset($errMessage)){
                                echo '<p style = "color: red; width: 100%; text-align: center;margin: 0;">'. $errMessage . '</p>';
                            }
                        ?>
                    </form>
                </div>
            </div>
            <div id="user_control_panel">
                <a href="<?php echo getUrl('login') ?>">войти под другим аккаунтом</a>
                <form action="<?= getUrl('exit')?>" method="POST">
                    <input type="submit" value="выйти" />
                </form>

            </div>
        </div>

    </main>
    <footer>
        <?php require_once('footer.php')?>
    </footer>
</div>
</body>
</html>
