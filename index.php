<?php

  require 'vendor/autoload.php';


  $app = new \Slim\Slim();
  
  // views initiatilisation
  $view = $app->view();
  $view->setTemplatesDirectory('view');

  $app->get('/', function () use ($app) {
    $app->render('index.php');
  });

   $app->get('/connexion', function () use ($app) {
    $app->render('connexion.php');
  });

     $app->get('/inscription', function () use ($app) {
    $app->render('inscription.php');
  });

  

  












  $app->run();


?>