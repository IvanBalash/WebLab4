<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >
    <link rel="stylesheet" href="styles/forme_style.css" >
    <title>logining</title>
</head>
<body>
<div id="frame">
    <header>
        <?php require_once('header.php')?>
    </header>
    <main>
        <?php
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $errors = new ErrorsCollector();
                $errMessage = "";
                $login = $_POST['login-input'];
                $pass = $_POST['pass'];
                $db = new DBmanager();
                $db->conect();
                $query ="SELECT * FROM users WHERE login = '$login';";
                $result = $db->query($query);
                if($result->num_rows == 1){
                    $row = $result->fetch_array();
                    if($row["password"] === md5($pass . "spider_man")){
                        session_start();
                        $_SESSION['id'] = $row["id"];
                        $_SESSION['name'] = $row["name"];
                        $_SESSION['login'] = $row["login"];
                    }
                }
                else{
                    $errors->addError("Такого пользователя не существует");
                }
                $errMessage = implode("<br/>",$errors->getErrors());
            }
        ?>
        <div id="log_section">
            <form action="login.php" method="POST">
                <input class="str_input" type="text" name="login-input" placeholder="login" required/><br/>
                <input class="str_input" type="password" name="pass" placeholder="password" required/><br/>
                <input class="sbmt_input" type="submit" value="login">
                <?php
                    if(isset($errMessage)){
                        echo '<p style = "color: red; width: 100%; text-align: center;margin: 0;">'. $errMessage . '</p>';
                    }
                    ?>
            </form>

            <ul id="other_ways">
                <li><a href="<?php echo getUrl('registration'); ?>">registration</a></li>
            </ul>
        </div>


    </main>
    <footer>
        <?php require_once('footer.php')?>
    </footer>
</div>
</body>
</html>

