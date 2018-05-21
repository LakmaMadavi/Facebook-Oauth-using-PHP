<?php
    require_once('Facebook/autoload.php');
    $fb = new Facebook\Facebook([
        'app_id' => '618827151784133', 
        'app_secret' =>'23ddc833610eb4bb7e4d13dd692bda7c',
        'default_graph_version' => 'v2.2',
        ]);
      
      $helper = $fb->getRedirectLoginHelper();
      
      $permissions = ['email']; // Optional permissions
      $loginUrl = $helper->getLoginUrl('https://localhost/User-Oauth/fb-callback.php', $permissions);
      
      echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
      
      

?>