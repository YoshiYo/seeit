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

  public function takeOneImage ($photo_id)
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

    $requete = $db->prepare("SELECT * from photos WHERE photo_id = :photo_id)");
    $valeursParam = array(":photo_id" => $photo_id);
    $requete->execute($valeursParam);
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
    $requete = $db->query('SELECT * FROM photos');

     // On affiche chaque entrée une à une
while ($donnees = $requete->fetch())

    echo ' 
        <div class="small-2 large-4 columns"><img src="'.$donnees["photo_src"].'"/></div>';
  }

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
}

?>