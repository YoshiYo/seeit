<?php

  require 'vendor/autoload.php';
  require 'model/image.class.php';


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
    $image = Image::takeAllImage();
  });

   $app->get('/connexion', function () use ($app) {
    $app->render('authentification/connexion.php');
  });


   $app->get('/images/:image_id', function ($image_id) use ($app) { // $image_id récupère l'id de l'image que l'on va récuperer
    $app->render('images/show.php');                                 // Nous pouvons très bien nous mettre sur slash, et dès que l'on clique
                                                                      // sur une image, on récupère l'id
  });

    $app->get('/inscription', function () use ($app) {
    $app->render('authentification/inscription.php');
  });

     $app->get('/test', function () use ($app) {
    $app->render('images/show.php');
  });




  

  












  $app->run();


?>