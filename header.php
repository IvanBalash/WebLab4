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
        <div class="search">
            <input type="text" name="serchform" id="main-search" />
            <button id="run-search">Поиск</button>
        </div>
        <div class="cabinet">
            <a href="<?php
                    if(session_status() == PHP_SESSION_ACTIVE){
                        echo getUrl('cabinet');
                    }
                    else{
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
            <li id="menu-icons"><a href="<?php echo getUrl('liked'); ?>"><img src="images/liked.png"></a></li>
            <li id="menu-icons"><a href="<?php echo getUrl('cart'); ?>"><img src="images/cart.png"></a></li>
        </ul>
    </div>
</div>
</header>
