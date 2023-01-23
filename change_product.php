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
        <?php require_once('header.php') ?>
    </header>
    <main>
        <?php
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $errors = new ErrorsCollector();
                $errMessage = "";
                $id = $_SESSION['productId'];
                $db = new DBmanager();
                $db->conect();
                $name = $_POST['name-input'];
                $price = $_POST['price-input'];
                $description = $_POST['description-input'];
                $query ="UPDATE products SET NAME = '$name', price = $price, description = '$description'  WHERE products.id = $id;";
                if(!($result = $db->query($query))){
                    $errors->addError("Не получилось изменить продукт в базу данных");
                }

                $errMessage = implode("<br/>",$errors->getErrors());
            }
        ?>
        <div id="log_section">
            <?php
                $id = $_SESSION['productId'];
                $db = new DBmanager();
                $db->conect();
                $query ="SELECT * FROM products WHERE id = '$id';";
                $result = $db->query($query);
                $row = $result->fetch_array();
            ?>
            <form action="change_product.php" method="POST">
                <label  for="name-input">Название товара</label>
                    <input class="str_input" type="text" name="name-input" value="<?= $row['NAME']?>" required/>
                <br/>
                <label for="price-input">Цена</label>
                    <input class="str_input" type="number" name="price-input" value="<?= $row['price']?>" required/>
                <br/>
                <label for="description-input">Описание</label>
                    <textarea class="str_input" name="description-input" required><?= $row['description']?> </textarea>


                <input class="sbmt_input" type="submit" value="изменить">
                <?php
                if(isset($errMessage)){
                    echo '<p style = "color: red; width: 100%; text-align: center;margin: 0;">'. $errMessage . '</p>';
                }
                ?>
            </form>
        </div>
    </main>
    <footer>
        <?php require_once('footer.php') ?>
    </footer>
</div>
</body>
</html>

