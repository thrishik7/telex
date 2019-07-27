<?php
 
  require "GoogleApi/vendor/autoload.php";
  $gClient= new Google_Client();
  $gClient->setClientId("153829526801-l2m0e3cumlouh585mq7696ome20ckoo5.apps.googleusercontent.com");
  $gClient->setClientSecret("yQp-yOn2VgKABwZB98-gx8gi");
  $gClient->setApplicationName("telex");
  $gClient->addScope("https://www.googleapis.com/auth/plus.login  https://www.googleapis.com/auth/userinfo.email");
  $gClient->setRedirectUri("https://localhost/project4/callback.php"); 
?>