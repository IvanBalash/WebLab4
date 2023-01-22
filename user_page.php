<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >
    <title>Shop</title>
</head>
<body>
<div id="frame">
    <header>
        <?php require_once('header.php')?>
    </header>
    <main>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $login = $_POST['login-input'];
            $pass = $_POST['pass'];

            echo $login . ' ' . $pass;
        }
        ?>
        <form action="/login.php" method="POST">
            <input type="text" name="login-input" placeholder="login"/><br/>
            <input type="password" name="pass" placeholder="password"/><br/>
            <input type="submit" vlaue="login">
        </form>
        <div id="options">
            <button name="registration">registration</button>
        </div>

    </main>
    <footer>
        <?php require_once('footer.php')?>
    </footer>
</div>
</body>
</html>
