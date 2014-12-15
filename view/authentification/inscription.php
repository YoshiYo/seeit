<?php
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
            $sql = $db->prepare("INSERT INTO users(mail, password, first_name, last_name, admin, avatar) VALUES (:mail, :password, :first_name, :last_name, 0, :avatar)");
            $valeursparam = array(":mail"=>$_POST['mail'],":password"=>md5($_POST['password']),
            ":first_name"=>$_POST['first_name'],
            ":last_name"=>$_POST['last_name'],
            ":avatar"=>$nomImage);
            $sql->execute($valeursparam);
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
              $message = 'Upload réussi !';
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
?>


<?php
      if( !empty($message) ) 
      {
        echo '<p>',"\n";
        echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
        echo "\t</p>\n\n";
      }
    ?>
    <!-- Debut du formulaire -->

    <div class="row content">
      <form enctype="multipart/form-data" action="" method="post">
        <div class="large-4 columns">
          <label>E-mail :<input required type="text" name="mail"/>
        </div>
        <div class="large-4 columns">
          <label>Mot de passe :<input required type="password" name="password"/>
        </div>
        <div class="large-4 columns">
          <label>Nom :<input required type="text" name="last_name"/>
        </div>
        <div class="large-4 columns">
          <label>Prenom :<input required type="text" name="first_name"/>
        </div> 
        <div class="large-4 columns">
          <p>
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Avatar :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
            <input required name="fichier" type="file" id="fichier_a_uploader" />
          </p>
           <input required type="submit" name="submit" value="M'inscrire" class="button small" />
        </div>
      </form>
    </div>
    <!-- Fin du formulaire -->