<?php

  require 'vendor/autoload.php';
	//require_once 'connexion_bdd.php';
  require_once 'model/User.php';
  require_once 'model/image.class.php';
  require_once 'model/recherche.php';
  session_start();


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
  
	$app->post('/connexion', function () use ($app) {    
	$user = User::connexion($_POST['mail'], $_POST['password']);
    $app->render('authentification/connexion.php');
	});

	$app->post('/inscription', function () use ($app) {
	$user = User::inscription($_POST['mail'], $_POST['password'], $_POST['first_name'], $_POST['last_name']);
    $app->render('authentification/inscription.php');
	});


   $app->get('/images/:image_id', function ($image_id) use ($app) { // $image_id récupère l'id de l'image que l'on va récuperer
    $app->render('images/show.php');                                 // Nous pouvons très bien nous mettre sur slash, et dès que l'on clique
                                                                      // sur une image, on récupère l'id
	});

    $app->get('/inscription', function () use ($app) {
    $app->render('authentification/inscription.php');
	});
  
   $app->get('/modifiercompte', function () use ($app) {
    $app->render('authentification/modifiercompte.php');
	});
  
    $app->post('/modifiercompte', function () use ($app) {
	$user = User::modification($_POST['newuser']);
    $app->render('authentification/modifiercompte.php');
	});

     $app->get('/test', function () use ($app) {
    $app->render('images/show.php');
	});

  $app->get('/infocompte', function () use ($app) {
    $app->render('authentification/infocompte.php');
  $user = User::afficher_compte();
  });
  
     $app->get('/deconnexion', function () use ($app) {    
    $app->render('authentification/deconnexion.php');
    $user = User::deconnexion();
  });

     $app->post('/recherche', function () use ($app) {
    $app->render('recherche.php');
    $recherche = Recherche::search_photo($_POST['s']);
  });

     $app->get('/addfavoris', function () use ($app) {
    $app->render('addfavoris.php');
    $photo = Image::addFavoris();
  });

     $app->get('/delfavoris', function () use ($app) {
    $app->render('delfavoris.php');
    $photo = Image::delFavoris();
  });



  $app->run();


?>