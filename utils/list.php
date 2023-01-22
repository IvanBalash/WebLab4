<?php
    function getUrl($page_name): string
    {
        $base_url = "../web/";

        $urls = [
            'db' => 'utils/DBmanager.php',
            'err' => 'utils/ErrorsCollector.php',
            'home' => 'index.php',
            'registration' => 'signup.php',
            'login' => 'login.php',
            'cabinet' => 'user_page.php',
            'cart' => 'cart.php',
            'liked' => 'liked.php',
            'change_catalog' => 'admin_catalog.php',
            'header' => 'header.php',
            'footer' => 'footer.php'
        ];
        return $base_url . $urls[$page_name];
    }

?>
