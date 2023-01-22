<?php session_start(); ?>

<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >
    <link rel="stylesheet" href="styles/forme_style.css" >

    <title>registration</title>
</head>
<body>
<div id="frame">
    <header>
        <?php require_once('header.php')?>
    </header>
    <main>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errors = new ErrorsCollector();
            $errMessage = null;
            $login = $_POST['login-input'];
            $name = $_POST['name-input'];
            $pass = $_POST['pass'];
            $passConf = $_POST['passConf'];
            if($pass !== $passConf){
                $errors->addError('Пароли не совпадают');
            }
            $db = new DBmanager();
            $db->conect();
            $query ="SELECT * FROM users WHERE login = '$login';";
            $result = $db->query($query);
            if($result) {
                if ($result->num_rows > 0) {
                    $errors->addError('Имя пользователя занято');
                } else {
                    if (!$errors->hasErrors()) {
                        $query = "INSERT INTO `users`( `login`, `password`, `name`) VALUES ('$login','" .
                            md5($pass . "spider_man") . "','$name');";
                        $result = $db->query($query);
                        $query ="SELECT * FROM users WHERE login = '$login';";
                        $result = $db->query($query);
                        $row = $result->fetch_array();
                        session_start();
                        $_SESSION['auth'] = true;
                        $_SESSION['id'] = $row["id"];
                        $_SESSION['name'] = $row["name"];
                        $_SESSION['login'] = $row["login"];
                        $_SESSION['access'] = $row["access"];

                        header ( 'Location: '. getUrl('home') );  // перенаправление на нужную страницу
                        exit();
                    }
                }
            }
            else{$errors->addError('Не получилось получить доступ к базе данных');}
            $errMessage = implode("<br/>",$errors->getErrors());
        }
        ?>
        <div id="log_section">
            <form action="signup.php" method="POST">
                <label>
                    <input class="str_input" type="text" name="login-input" placeholder="логин" required/>
                </label>
                <label>
                    <input class="str_input" type="text" name="name-input" placeholder="имя" required/>
                </label>
                <label>
                    <input class="str_input" type="password" name="pass" placeholder="пароль" minlength="8" required/>
                </label>
                <label>
                    <input class="str_input" type="password" name="passConf" placeholder="подтвердите пароль" minlength="8" required/>
                </label>
                <input class="sbmt_input" type="submit" value="зарегистрироваться">
                <?php
                if(isset($errMessage)){
                    echo '<p style = "color: red; width: 100%; text-align: center; margin: 0;">'. $errMessage . '</p>';
                }
                ?>
            </form>
            <ul id="other_ways">
                <li><a href="<?php echo getUrl('login'); ?>">войти</a></li>
            </ul>
        </div>
    </main>
    <footer>
        <?php require_once('footer.php')?>
    </footer>
</div>
</body>
</html>
