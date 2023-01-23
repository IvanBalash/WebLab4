<?php session_start(); ?>
<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/Header_style.css" >
    <link rel="stylesheet" href="styles/Main_style.css" >
    <link rel="stylesheet" href="styles/Footer_style.css" >
    <link rel="stylesheet" href="styles/product_collection_style.css" >

    <title>in progress</title>
</head>
<body>
<div id="frame">
    <header>
        <?php require_once('header.php')?>
    </header>
    <main>
        <div id="goods">
            <ul id="product_collection">
                <?php
                    $db = new DBmanager();
                    $db->conect();
                    $id = $_SESSION['id'];
                    $query ="SELECT * FROM products WHERE id IN (SELECT product_id FROM liked WHERE user_id = '$id');";
                    $result = $db->query($query);
                    if($result->num_rows > 0){
                        foreach ($result as $row){
                            $productId = $row['id'];
                            ?>
                            <li>
                                <h1><?= $row['NAME']?></h1>
                                <div>
                                    <img src="images/images.jpg" alt="name-input">
                                        <p class="description"><?= $row['description']?></p>
                                </div>
                                <h2>Цена: <?= $row['price']?></h2>
                                <form action="utils/add_to_cart.php" method="POST">
                                    <button value="<?= $productId?>" name="cart" class="buy-button">в корзину</button>
                                </form>

                            </li>
                        <?php }
                    }
                    else{
                        echo "<h1>У вас пока нет ничего в понравившемся</h1>";
                    }?>
            </ul>
        </div>
    </main>
    <footer>
        <?php require_once('footer.php')?>
    </footer>
</div>
</body>
</html>
