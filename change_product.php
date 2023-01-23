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
            $name = $_POST['name-input'];
            $price = $_POST['price-input'];
            $description = $_POST['description-input'];
            $errMessage = "";
            $db = new DBmanager();
            $db->conect();
            $query ="INSERT INTO products (price, NAME, description) VALUES ('$price', '$name', '$description');";
            if(!($result = $db->query($query))){
                $errors->addError("Не получилось добавить продукт в базу данных");
            }

            $errMessage = implode("<br/>",$errors->getErrors());
        }
        ?>
        <div id="log_section">
            <form action="create_product.php" method="POST">
                <label>
                    <input class="str_input" type="text" name="name-input" placeholder="Название" required/>
                </label><br/>
                <label>
                    <input class="str_input" type="number" name="price-input" placeholder="Цена" required/>
                </label><br/>
                <label>
                    <textarea class="str_input" name="description-input" placeholder="Описание" required></textarea>
                </label>

                <input class="sbmt_input" type="submit" value="Создать">
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

