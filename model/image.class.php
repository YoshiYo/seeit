<?php 

class Image {

	private $photo_id;
	private $photo_src;
	private $user_id;
	private $title;
	private $description;
	private $categorie;
	private $size;
	private $color;

	public function __construct($photo_id, $photo_src, $user_id, $title, $description, $categorie, $size, $color){
       $this->_photo_id = $photo_id;
       $this->_photo_src = $photo_src;
       $this->_user_id = $user_id;
       $this->_title = $title;
       $this->_description = $description;
       $this->_categorie = $categorie;
       $this->_size = $size;
       $this->_color = $color;
   }

   public function getPhotoId ()
   {
   	return $this->_photo_id;
   }

   public function getPhotoSrc ()
   {
   	return $this->_photo_src;
   }

   public function getUserId ()
   {
   	return $this->_user_id;
   }

   public function getTitle ()
   {
   	return $this->_title;
   }

   public function getDescription ()
   {
    return $this->_description;
   }

   public function getCategorie ()
   {
    return $this->_categorie;
   }

   public function getSize ()
   {
    return $this->_user_id;
   }

   public function getColor ()
   {
    return $this->_color;
   }

  public static function takeOneImage ()
  {
    //Select * From photos Were photo_id = $photo_id

    try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
    $photo_id = $_GET["photo_id"];
    $requete = $db->prepare("SELECT * from photos WHERE photo_id = :photo_id");
    $valeursParam = array(":photo_id" => $photo_id);
    $requete->execute($valeursParam);
    $donnees = $requete ->fetch();
    echo 
    '
    <div class="row content">
    <h2>'.$donnees["title"].'</h2>
    <div id="sphere" style="width: 100%; height: 600px;"></div>
    <script type="text/javascript">
    new Photosphere("'.$donnees["photo_src"].'").loadPhotosphere(document.getElementById("sphere"));
    </script>
    </div>
    ';

  }
  public static function galerie () 
  {
    try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    //$requete = $db->prepare("SELECT * from photos ORDER BY photo_id)");
    //$requete->execute();
    $requete = $db->prepare('SELECT * FROM photos WHERE user_id = :user_id');
    $valeursParam = array(":user_id" => $_SESSION['utilisateur_id']);
    $requete->execute($valeursParam);
if(isset($_SESSION['mail'])){
    $requete2 = $db->prepare('SELECT * FROM favoris fav JOIN photos pho ON fav.photo_id = pho.photo_id WHERE fav.user_id='.$_SESSION['utilisateur_id'].' ORDER BY fav.photo_id DESC');
    $requete2->execute();

    $requete3 = $db->prepare('SELECT COUNT(favori_id) "nb" FROM favoris WHERE user_id='.$_SESSION['utilisateur_id']);
    $requete3->execute();
    $donnees3 = $requete3->fetch();
    if ($donnees3['nb'] != 0){
    echo"
    <div class='row content'>
    <h3>FAVORIS : </h3>";

    while($donnees2 = $requete2->fetch())
    {
      echo '
        <div class="small-2 large-4 columns content_img">
          <img class="favoris" src="'.$donnees2["photo_src"].'"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id="'.$donnees2["photo_id"].'"> <p class="titre">'.$donnees["title"].'</p></a>
            <a href="/seeit/delfavoris?photo_id='.$donnees2["photo_id"].'"><div class="fav"><img class="ico_del_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>';

    }
    echo "</div>";
  }}
     // On affiche chaque entrée une à une
    echo "
    <div class='row content'>
    <h3>EXPLORER : </h3>";
while ($donnees = $requete->fetch())

    echo '
        <div class="small-2 large-4 columns content_img">
          <img src="'.$donnees["photo_src"].'"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id='.$donnees["photo_id"].'"><p class="titre">'.$donnees["title"].'</p></a>
            <a href="/seeit/addfavoris?photo_id='.$donnees["photo_id"].'"><div class="fav"><img class="ico_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>';
  }

  public static function takeAllImage () 
  {
    try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    //$requete = $db->prepare("SELECT * from photos ORDER BY photo_id)");
    //$requete->execute();
    $requete = $db->query('SELECT * FROM photos ORDER BY photo_id DESC');
if(isset($_SESSION['mail'])){
    $requete2 = $db->prepare('SELECT * FROM favoris fav JOIN photos pho ON fav.photo_id = pho.photo_id WHERE fav.user_id='.$_SESSION['utilisateur_id'].' ORDER BY fav.photo_id DESC');
    $requete2->execute();

    $requete3 = $db->prepare('SELECT COUNT(favori_id) "nb" FROM favoris WHERE user_id='.$_SESSION['utilisateur_id']);
    $requete3->execute();
    $donnees3 = $requete3->fetch();
    if ($donnees3['nb'] != 0){
    echo"
    <div class='row content'>
    <h3>FAVORIS : </h3>";

    while($donnees2 = $requete2->fetch())
    {
      echo '
        <div class="small-2 large-4 columns content_img">
         <img class="favoris" src="'.$donnees2["photo_src"].'"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id='.$donnees2["photo_id"].'"><p class="titre">'.$donnees2["title"].'</p></a>
            <a href="/seeit/delfavoris?photo_id='.$donnees2["photo_id"].'"><div class="fav"><img class="ico_del_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>';

    }
    echo "</div>";
  }}
     // On affiche chaque entrée une à une
    echo "
    <div class='row content'>
    <h3>EXPLORER : </h3>";
while ($donnees = $requete->fetch())
{

    echo '
        <div class="small-2 large-4 columns content_img">
          <img src="'.$donnees["photo_src"].'"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id='.$donnees["photo_id"].'"><p class="titre">'.$donnees["title"].'</p></a>
            <a href="/seeit/addfavoris?photo_id='.$donnees["photo_id"].'"> <div class="fav"><img class="ico_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>';
  }}

  public static function takeImageCategorie ($categorie)
  {
    //Select * From photos Where categorie = $categorie
    try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    $requete = $db->prepare("SELECT * from photos WHERE categorie = :categorie)");
    $valeursParam = array(":categorie" => $categorie);
    $requete->execute($valeursParam);
  }

  public function takeImageSize ($size)
  {
    //Select * From photos Where size = $size
    try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    $requete = $db->prepare("SELECT * from photos WHERE size = :size)");
    $valeursParam = array(":size" => $size);
    $requete->execute($valeursParam);

  }

  public function takeImageColor ($color)
  {
    //Select * From photos Where color = $color
    try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    $requete = $db->prepare("SELECT * from photos WHERE color = :color)");
    $valeursParam = array(":color" => $color);
    $requete->execute($valeursParam);
  }

  public function addImage ($photo_src, $user_id, $title, $description, $categorie, $size, $color)
  {
    try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    $photo_src = $_POST['photo_src'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];
    $size = $_POST['size'];
    $color = $_POST['color'];

    $requete = $db->prepare("INSERT INTO  `seeit`.`photos` (`photo_src` ,`title` ,`description` ,`categorie`, 'size', 'color') VALUES (:photo_src, :title, :description, :categorie, :size, :color)");
    $valeurParam = array(':photo_src'=> $photo_src,':title'=>$title, ':description'=>$description, ':categorie'=>$categorie, ':size'=>$size, ':color'=>$color);
    $requete->execute($valeurParam);
  }

  public static function addFavoris()
  {
       try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
      $photo_id = $_GET["photo_id"];
    if (isset($_SESSION['mail']))
    {
      $requete = $db->prepare("INSERT INTO `seeit`.`favoris` (`user_id`, `photo_id`) VALUES (:user_id, :photo_id);");
      $valeurParam = array(':user_id'=> $_SESSION['utilisateur_id'], ':photo_id'=> $photo_id);
      $requete->execute($valeurParam);
     header('location: /seeit/');
      exit;
    }
    else {header('location: /seeit/connexion'); exit;}

  }

  public static function delFavoris()
  {

     try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
      $photo_id = $_GET["photo_id"];
      if (isset($_SESSION['mail']))
    {
      $requete = $db->prepare("DELETE FROM favoris WHERE photo_id = :photo_id AND user_id = :user_id");
      $valeurParam = array(':user_id'=> $_SESSION['utilisateur_id'], ':photo_id'=> $photo_id);
      $requete->execute($valeurParam);
     header('location: /seeit/');
      exit;
    }
    else {header('location: /seeit/connexion');}


  }

  public function ifFavoris()
  {
      try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    $requete = ('SELECT * FROM favoris WHERE user_id='.$_SESSION['utilisateur_id']);
    $donnees = $db->prepare($requete);
    $donnees->execute();


  }

}

?>