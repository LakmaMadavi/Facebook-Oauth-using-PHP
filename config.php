<?php
    session_start();
    require_once "Facebook/autoload.php";

    $FB = new \Facebook\Facebook([
        'app_id' => '618827151784133', 
        'app_secret' =>'23ddc833610eb4bb7e4d13dd692bda7c',
        'default_graph_version' => 'v3.0',
    ]);
    $helper = $FB->getRedirectLoginHelper();
?>

 