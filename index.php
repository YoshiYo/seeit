<?php

  require 'vendor/autoload.php';


  $app = new \Slim\Slim(array(
    'view' => '\Slim\LayoutView', // I activate slim layout component
    'layout' => 'layouts/main.php' // I define my main layout
  ));
  
  // views initiatilisation
  $app->hook('slim.before.router', function () use ($app) {
    $app->view()->setData('app', $app);
     });

  $view = $app->view();
  $view->setTemplatesDirectory('view');

  $app->get('/', function () use ($app) {
    $app->render('index.php');
  });

   $app->get('/connexion', function () use ($app) {
    $app->render('authentification/connexion.php');
  });
  
	$app->post('/connexion', function () use ($app) {
    $app->render('authentification/connexion.php');
  });

  

  












  $app->run();


?>