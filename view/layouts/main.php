<!doctype html>
<html class="no-js" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/mycss.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/three.min.js"></script>
    <script src="js/sphere.js"></script>
  </head>
  <body>
    <?php

    if (isset($_SESSION['mail'])) { ?>

	<nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="/seeit/">Seeit</a></h1>
        </li>
<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
<!-- Right Nav Section -->
        <ul class="right">
          <li class="has-form"> <div class="row collapse"> <div class="large-8 small-9 columns"> <form method="post" action="/seeit/recherche"><input name ="s" type="text" placeholder="Find Stuff"> </div> <div class="large-4 small-3 columns"> <input type="submit" class="alert button expand"/> </div></form> </div> </li>
          <li class=""><a href="/seeit/infocompte">Mon compte</a></li>
          <li class=""><a href="/seeit/deconnexion">Déconnexion</a></li>
        </ul>

<!-- Left Nav Section -->
        <ul class="left">
          <li class="active"><a href="/seeit/test">Importer</a></li>
          <li class="has-dropdown">
            <a href="#">Explorer</a>
            <ul class="dropdown">
              <li><a href="#">Paysage</a></li>
              <li><a href="#">Art</a></li>
              <li><a href="#">Animal</a></li>
              <li><a href="#">Sport</a></li>
              <li><a href="#">Immobilier</a></li>
              <li><a href="#">Musique</a></li>
            </ul>
          </li>
          <li class=""><a href="/seeit/galerie">Ma Galerie</a></li>
        </ul>
      </section>
    </nav>
    <?php }
    else
      {?>

    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="/seeit/">Seeit</a></h1>
        </li>
<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
<!-- Right Nav Section -->
        <ul class="right">
           <li class="has-form"> <div class="row collapse"> <div class="large-8 small-9 columns"> <form method="post" action="/seeit/recherche"><input name ="s" type="text" placeholder="Find Stuff"> </div> <div class="large-4 small-3 columns"> <input type="submit" class="alert button expand"/> </div></form> </div> </li>
          <li class=""><a href="/seeit/connexion">Connexion</a></li>
        </ul>

<!-- Left Nav Section -->
        <ul class="left">
          <li class="active"><a href="/seeit/inscription">Inscription</a></li>
          <li class="has-dropdown">
            <a href="#">Explorer</a>
            <ul class="dropdown">
              <li><a href="#">Paysage</a></li>
              <li><a href="#">Art</a></li>
              <li><a href="#">Animal</a></li>
              <li><a href="#">Sport</a></li>
              <li><a href="#">Immobilier</a></li>
              <li><a href="#">Musique</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </nav>

    <?php } ?>
<ul class="breadcrumbs"> 
  <li><a href="#">Paysage</a></li>
  <li><a href="#">Art</a></li>
  <li><a href="#">Animal</a></li>
  <li><a href="#">Sport</a></li> 
  <li><a href="#">Immobilier</a></li>
  <li><a href="#">Musique</a></li> 
</ul>
<?php 
echo $yield;
?>

</body>
</html>