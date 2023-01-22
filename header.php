<?php
    require_once(__DIR__ . '/utils/list.php');
    require_once(getUrl('db'));
    require_once(getUrl('err'));
?>
<div class="logo">
    <img src="images/Logo.png">
</div>
<div class="menu-block">
    <div id="up-menu">
        <form class="search" action="search.php" method="POST">
            <input type="text" name="search_query" id="main-search" />
            <input type="submit" value="поиск" id="run-search">
        </form>
        <div class="cabinet">
            <a href="<?php
                    if(isset($_SESSION['auth'])){
                        echo getUrl('cabinet');
                    }
                    else{
                        session_destroy();
                        echo getUrl('login');
                    }
                     ?>"><img src="images/cabinet.png"></a>
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
                ?>"><img src="images/liked.png"></a></li>
            <li id="menu-icons"><a href="<?php
                if(isset($_SESSION['auth'])){
                    echo getUrl('cart');
                }
                else{
                    echo getUrl('login');
                }
                ?>"><img src="images/cart.png"></a></li>
        </ul>
    </div>
</div>
</header>
