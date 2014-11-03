<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
      <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">My Site</a></h1>
    </li>
	<?php
	session_start();

if ( !empty($_SESSION) )
	{
		echo "<h4>Bonjour ".$_SESSION['utilisateur']. "</h4>" ;
		echo '<a href="deconnexion.php" > DECONNEXION</a>' ;
	
	} else {
	echo ' ' ;
	}
	
	?>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="active"><a href="#">Right Button Active</a></li>
      <li class="has-dropdown">
        <a href="#">Right Button Dropdown</a>
        <ul class="dropdown">
          <li><a href="#">First link in dropdown</a></li>
          <li class="active"><a href="#">Active link in dropdown</a></li>
        </ul>
      </li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul>
  </section>
</nav>
<?php

  require 'vendor/autoload.php';


  $app = new \Slim\Slim();

  $app->get('/', function () {
  });

  $app->get('/hello/:name', function ($name) {
  });
  

  $app->run();


?>
<!doctype html>
<html class="no-js" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="#">Seeit</a></h1>
        </li>
<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
<!-- Right Nav Section -->
        <ul class="right">
          <li class="has-form"> <div class="row collapse"> <div class="large-8 small-9 columns"> <input type="text" placeholder="Find Stuff"> </div> <div class="large-4 small-3 columns"> <a href="#" class="alert button expand">Search</a> </div> </div> </li>
          <li class=""><a href="#">Connexion</a></li>
        </ul>

<!-- Left Nav Section -->
        <ul class="left">
          <li class="active"><a href="#">Inscription</a></li>
          <li class="has-dropdown">
            <a href="#">Explorer</a>
            <ul class="dropdown">
              <li><a href="#">Catégorie</a></li>
              <li><a href="#">Catégorie</a></li>
              <li><a href="#">Catégorie</a></li>
              <li><a href="#">Catégorie</a></li>
              <li><a href="#">Catégorie</a></li>
              <li><a href="#">Catégorie</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </nav>    

<ul class="breadcrumbs"> 
  <li><a href="#">Home</a></li>
  <li><a href="#">Features</a></li> 
</ul>

</body>
</html>
=======
  echo 'Notre premier test github - master';
  echo 'Coucou cest Auguste';

	echo "<a href='model/inscription.php'>INSCRIPTION</a></br>";
  echo "<a href='model/connexion.php'>CONNEXION</a></br>";
?>

    </body>
    </html>
