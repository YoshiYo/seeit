
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>Slim Framework for PHP 5</title>
            <link rel="stylesheet" href="../css/foundation.css" />
            <link rel="stylesheet" href="../css/mycss.css" />
            <script src="js/vendor/modernizr.js"></script>
        </head>
        <body>
            <nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Logo</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
    <li class="has-form">
  <div class="row collapse">
    <div class="large-8 small-9 columns2">
      <input type="text" placeholder="">
    </div>
    <div class="large-4 small-3 columns2">
      <a href="#" class="alert button expand">Search</a>
    </div>
  </div>
</li>
      <li class=""><a href="php/connexion.php">Connexion</a></li>

    </ul>

    <!-- Left Nav Section -->
    <ul class="left">

      <li class="marge20"><a class="button [radius round]" href="php/sign-up.php">Inscription</a></li>
      <ul id="menu-deroulant">
        <li><a href="#" class="">Explorer</a>
          <ul>
            <li><a href="#" class="button [tiny small large]">Catégorie</a></li>
            <li><a href="#" class="button [tiny small large]">Catégorie</a></li>
            <li><a href="#" class="button [tiny small large]">Catégorie</a></li>
            <li><a href="#" class="button [tiny small large]">Catégorie</a></li>
            <li><a href="#" class="button [tiny small large]">Catégorie</a></li>
            <li><a href="#" class="button [tiny small large]">Catégorie</a></li>
          </ul>
        </li>
      </ul>
      <li class=""><a href="#">Importer</a></li>


    </ul>

    
  </section>
</nav>
          <form>
            <div class="row">
              <div class="large-6 columns2" required>
                <label>Nom :
                  <input type="text"/>
                </label>
              </div>
              <div class="large-6 columns2" required>
                <label>Prénom :
                  <input type="text"/>
                </label>
              </div>
              <div class="large-6 columns2 required" required>
                <label>E-mail :
                  <input type="text"/>
                </label>
              </div>
              <div class="large-6 columns2" required>
                <label>Date de naissance :
                  <input type="date"/>
                </label>
              </div>
              <div class="large-6 columns2" required>
                <label>Mot de passe :
                  <input type="password"/>
                </label>
              </div>
              <div class="large-6 columns2" required>
                <label>Mot de passe :
                  <input type="password"/>
                </label>
              </div>
              <div class="large-12 columns2">
                <input type="submit" value="Valider" class="button"/>
              </div>
            </div>
          </div>
        </form>
      </body>
    </html> 