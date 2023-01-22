<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >

    <link rel="stylesheet" href="styles/cabinet_style.css_style.css" >

    <title>Shop</title>
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
                    <form action="login.php" method="POST">
                        <input class="str_input" type="text" name="name-input" placeholder="<?php
                            echo $_SESSION['name'];
                        ?>" />
                        <input class="str_input" type="text" name="login-input" placeholder="<?php
                            echo $_SESSION['login'];
                        ?>" />
                        <input class="str_input" type="password" name="oldPass" minlength="8" />
                        <input class="str_input" type="password" name="newPass" minlength="8" />
                        <input class="sbmt_input" type="submit" value="Применить">
                    </form>
                </div>
            </div>
            <div id="user_control_panel">
                <a href="#">редактировать товары</a>
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
