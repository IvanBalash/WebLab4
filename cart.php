<?php session_start(); ?>
<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >


    <title>in progress</title>
</head>
<body>
<div id="frame">
    <header>
        <?php require_once('header.php')?>
    </header>
    <main>
        <div id="goods">
            <ul>
                <?php
                $db = new DBmanager();
                $db->conect();
                $id = $_SESSION['id'];
                $query ="SELECT * FROM products WHERE id IN (SELECT product_id FROM cart WHERE user_id = '$id');";
                $result = $db->query($query);
                foreach ($result as $row){
                    ?>
                    <li>
                        <div>
                            <img src="images/images.jpg" alt="nothing">
                            <p><?= $row['NAME']?></p>
                            <p><?= $row['price']?></p>
                            <button class="buy-button">Купить</button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </main>
    <footer>
        <?php require_once('footer.php')?>
    </footer>
</div>
</body>
</html>
