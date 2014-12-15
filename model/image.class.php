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
          <img class="favoris" src="img/'.$donnees2["photo_src"].'"/>
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
          <img src="img/'.$donnees["photo_src"].'"/>
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
         <img class="favoris" src="img/'.$donnees2["photo_src"].'"/>
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
          <img src="img/'.$donnees["photo_src"].'"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id='.$donnees["photo_id"].'"><p class="titre">'.$donnees["title"].'</p></a>
            <a href="/seeit/addfavoris?photo_id='.$donnees["photo_id"].'"> <div class="fav"><img class="ico_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>';
  }}

  public static function takeImageCategorie ()
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

    $requete = $db->prepare("SELECT * from photos WHERE categorie = :categorie");
    $valeursParam = array(":categorie" => $_GET['categorie']);
    $requete->execute($valeursParam);

     // On affiche chaque entrée une à une
    echo "
    <div class='row content'>
    <h3>EXPLORER : </h3>";
while ($donnees = $requete->fetch())
{

    echo '
        <div class="small-2 large-4 columns content_img">
          <img src="img/'.$donnees["photo_src"].'"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id='.$donnees["photo_id"].'"><p class="titre">'.$donnees["title"].'</p></a>
            <a href="/seeit/addfavoris?photo_id='.$donnees["photo_id"].'"> <div class="fav"><img class="ico_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>';
  }
  }

  public static function addImage ()
  {
   // Constantes
define('TARGET', 'img/');    // Repertoire cible
define('MAX_SIZE', 1000000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 1000000000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 1000000000);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if( !is_dir(TARGET) ) {
  if( !mkdir(TARGET, 0755) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
            try
            {
              $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
              $db->query('SET NAMES utf8');
            }
            catch (Exception $e)
            {
              die('Erreur : ' . $e->getMessage());
            }

            $sql = $db->prepare("INSERT INTO photos(photo_src, title, description, categorie, user_id) VALUES (:photo_src, :title, :description, :categorie, :user_id)");
            $valeursparam = array(":photo_src"=>$nomImage, ":title"=>$_POST['title'], ":description"=>$_POST['description'],":categorie"=>$_POST['categorie'],":user_id"=>$_SESSION['utilisateur_id']);
            $sql->execute($valeursparam);
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
             $message = 1;
            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
  }
}
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