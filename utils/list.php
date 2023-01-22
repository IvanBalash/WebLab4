<?php
    function getUrl($page_name): string
    {
        $base_url = "../web/";

        $urls = [
            'exit' => 'utils/exit.php',
            'db' => 'utils/DBmanager.php',
            'err' => 'utils/ErrorsCollector.php',
            'home' => 'index.php',
            'newProduct' => 'create_product.php',
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
