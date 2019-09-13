<?php
    require_once __DIR__.'/Instagram.php';
    
    use MetzWeb\Instagram\Instagram;

    // initialize class
    $instagram = new Instagram(array(
        'apiKey' => '93b6e05bdb4a4b0eb0558f32b93ecb97',
        'apiSecret' => '2588d627a6194793a11f1359a97f8d20',
        'apiCallback' => 'https://hotfollow.com.br/config/api/instagramLogin/success.php' // must point to success.php
    ));

    // create login URL
    $loginUrl = $instagram->getLoginUrl();
?>