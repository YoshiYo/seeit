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

  $app->hook('verification.admin', function () use ($app) {
    if( isset($_SESSION['admin']) && $_SESSION['admin'] )
    {
        return true;
    }
    else
    {
      $app->redirect($app->urlFor('accueil'));
    }
     });

  $app->get('/admin', function () use ($app) {
    $app->applyHook('verification.admin');
    $app->render('zone_admin/index.php');
  })->name('admin');

  $app->post('/admin', function () use ($app) {
    $users = User::modificationadmin();
    $app->render('zone_admin/index.php', array('users' => $users));
  })->name('modificationadmin');

  $app->post('/admin', function () use ($app) {
    $users = User::removeuser();
    $app->render('zone_admin/index.php', array('users' => $users));
  });

  $app->post('/removeuser', function () use ($app) {
    User::removeuser($_POST["userid"]);
    $app->redirect($app->urlFor('modificationadmin'));
  })->name('remove');


  $view = $app->view();
  $view->setTemplatesDirectory('view');

  $app->get('/', function () use ($app) {
  $requete2 = Image::takeAllImage1();
  $donnees3 = Image::takeAllImage2();
  $requete = Image::takeAllImage3();
    $app->render('index.php', array('requete2'=>$requete2, 'donnees3'=>$donnees3, 'requete'=>$requete));
    
  })->name('accueil');

   $app->get('/connexion', function () use ($app) {
    $app->render('authentification/connexion.php');
  })->name('connexion');
  
	$app->post('/connexion', function () use ($app) {    
	$user = User::connexion($_POST['mail'], $_POST['password']);
    if ($user == true)
    {
       $app->redirect($app->urlFor('accueil'));  
    }
    else
    {
        $app->flash('error', 'L\'adresse email et le mot de passe que vous avez entrés ne correspondent pas à ceux présents dans nos fichiers. Veuillez vérifier et réessayer.');
        $app->redirect($app->urlFor('connexion'));
       
    }
    $app->render('authentification/connexion.php');
    
	});

  $app->get('/inscription', function () use ($app) {
  $app->render('authentification/inscription.php');
  });

	$app->post('/inscription', function () use ($app) {
	  //$user = User::inscription($_POST['mail'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['avatar']);
    $app->render('authentification/inscription.php');
    $app->redirect($app->urlFor('connexion'));
	});


   $app->get('/images/:image_id', function ($image_id) use ($app) { // $image_id récupère l'id de l'image que l'on va récuperer
    $app->render('images/show.php');                                 // Nous pouvons très bien nous mettre sur slash, et dès que l'on clique
                                                                      // sur une image, on récupère l'id
	});
  
   $app->get('/modifiercompte', function () use ($app) {
    $app->render('authentification/modifiercompte.php');
	});
  
    $app->post('/modifiercompte', function () use ($app) {
    $app->render('authentification/modifiercompte.php');
		$user = User::modification($_POST['newuser']);
	});

     $app->get('/test_image', function () use ($app) {
    $app->render('images/show_test.php');
	});

  $app->get('/infocompte', function () use ($app) {
  $row = User::afficher_compte();
    $app->render('authentification/infocompte.php', array('row'=>$row));
  });
  
     $app->get('/deconnexion', function () use ($app) {    
    $app->render('authentification/deconnexion.php');
    $user = User::deconnexion();
  });

     $app->post('/recherche', function () use ($app) {
    $app->render('recherche.php');
    $recherche = Recherche::search_photo($_POST['s']);
    $recherche = Recherche::search_user($_POST['s']);
  });

     $app->get('/addfavoris', function () use ($app) {
    $app->render('addfavoris.php');
    $photo = Image::addFavoris();
  });

     $app->get('/delfavoris', function () use ($app) {
    $app->render('delfavoris.php');
    $photo = Image::delFavoris();
  });

    $app->get('/galerie', function () use ($app) {
    $donnees3 = Image::galerie1();
	$requete2 = Image::galerie2();
	$requete = Image::galerie3();	
	$app->render('galerie.php', array('donnees3'=>$donnees3, 'requete2'=>$requete2, 'requete'=>$requete));
    
  });

    $app->get('/user', function () use ($app) {
	$donnees = User::userGalerie();
    $app->render('user.php', array('donnees'=>$donnees));
    
  });

     $app->get('/image', function () use ($app) {
      $donnees = Image::takeOneImage();
	  $app->render('image.php', array('donnees'=>$donnees));
      
      $image = Image::takeAllImage();
  });

      $app->get('/importer', function () use ($app) {       
      $image = Image::addImage();
      $app->render('test.php');
  });
  
      $app->post('/importer', function () use ($app) {        
      $image = Image::addImage();
      $app->render('test.php');
  });
  
  $app->get('/modifierimage', function () use ($app) {        
      $app->render('authentification/modifierimage.php');
  });
	
	$app->post('/modifierimage', function () use ($app) {        
      $image = Image::modifyImage();
      $app->render('authentification/modifierimage.php');
  });

      $app->get('/categorie', function () use ($app) {
	  $requete = Image::takeImageCategorie();
      $app->render('categorie.php', array('requete'=>$requete));
      
  });

  $app->run();


?>