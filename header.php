<?php
    require_once(__DIR__ . '/utils/list.php');
    require_once(getUrl('db'));
    require_once(getUrl('err'));
?>
<div class="logo">
    <img src="images/Logo.png" alt="name-input">
</div>
<div class="menu-block">
    <div id="up-menu">
        <div class="search">
            <input type="text" name="search_query" id="main-search" />
            <input type="submit" value="поиск" id="run-search" />
        </div>
        <div class="cabinet">
            <a href="<?php
                    if(isset($_SESSION['auth'])){
                        echo getUrl('cabinet');
                    }
                    else{
                        session_destroy();
                        echo getUrl('login');
                    }
                     ?>"><img src="images/cabinet.png" alt="name-input"></a>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li><ul>
                    <?php $url = getUrl('home'); ?>
                    <li><a href="<?php echo $url; ?>" class="navigation">Главная</a></li>
                    <li><a href="<?php echo $url; ?>#catalog" class="navigation">Каталог</a></li>
                    <li><a href="<?php echo $url; ?>#deliv" class="navigation">Доставка</a></li>
                    <li><a href="<?php echo $url; ?>#contacts" class="navigation">контакты</a></li>
                </ul></li>
            <li id="line"></li>
            <li id="menu-icons"><a href="<?php
                if(isset($_SESSION['auth'])){
                    echo getUrl('liked');
                }
                else{
                    echo getUrl('login');
                }
                ?>"><img src="images/liked.png" alt="name-input"></a></li>
            <li id="menu-icons"><a href="<?php
                if(isset($_SESSION['auth'])){
                    echo getUrl('cart');
                }
                else{
                    echo getUrl('login');
                }
                ?>"><img src="images/cart.png" alt="name-input"></a></li>
        </ul>
    </div>
</div>

