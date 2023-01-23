<?php session_start(); ?>
<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >
    <link rel="stylesheet" href="styles/forme_style.css" >
    <link rel="stylesheet" href="styles/cabinet_style.css" >

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
                <?php require_once('utils/change_account.php') ?>
                <form action="user_page.php" method="POST">
                    <div><label for="name-input">Имя:</label><input class="str_input" type="text" name="name-input" value="<?php
                    echo $_SESSION['name'];
                    ?>" /></div>
                    <div><label for="login-input">Логин:</label><input class="str_input" type="text" name="login-input" value="<?php
                    echo $_SESSION['login'];
                    ?>" /></div>
                    <div><label for="oldPass">Пароль:</label><input class="str_input" type="password" name="oldPass" minlength="3" /></div>
                    <div><label for="newPass">новый пароль:</label><input class="str_input" type="password" name="newPass" minlength="8" /></div>
                    <input class="sbmt_input cab_btn" type="submit" value="Применить">
                    <?php
                    if(isset($errMessage)){
                        echo '<p style = "color: red; width: 100%; text-align: center;margin: 0;">'. $errMessage . '</p>';
                    }
                    ?>
                </form>
            </div>
            <div id="user_control_panel">
                <ul>
                    <li>
                        <form  id="exit" action="<?= getUrl('exit')?>" method="POST">
                            <input class="sbmt_input"  type="submit" value="выйти" />
                        </form>
                    </li>
                    <li>
                        <a href="<?php echo getUrl('login') ?>">войти под другим аккаунтом</a>
                    </li>
                </ul>

            </div>
        </div>

    </main>
    <footer>
        <?php require_once('footer.php')?>
    </footer>
</div>
</body>
</html>
