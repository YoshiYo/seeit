<!doctype html>
<html class="no-js" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/three.min.js"></script>
    <script src="js/sphere.js"></script>
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
          <li class=""><a href="/seeit/connexion">Connexion</a></li>
        </ul>

<!-- Left Nav Section -->
        <ul class="left">
          <li class="active"><a href="/seeit/inscription">Inscription</a></li>
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

<?php 
echo $yield;
?>

</body>
</html>