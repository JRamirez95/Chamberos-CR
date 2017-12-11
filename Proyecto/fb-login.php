<?php
 
/* Iniciando la sesión*/
session_start();
 
/* Cambiar según la ubicación de tu directorio*/
require_once __DIR__ . '/fb/src/Facebook/autoload.php'; 

$fb = new Facebook\Facebook([
    'app_id' => '131844294156808', // Replace {app-id} with your app id
    'app_secret' => '8e166fe19c263cd7ae5b45b22fa4e04e',
    'default_graph_version' => 'v2.2',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('http://localhost//Proyecto/Proyecto/fb-callback.php', $permissions);
  
  echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>