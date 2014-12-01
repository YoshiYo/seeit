<?php



class User{
	private $id;
	private $mail;
	private $password;
	private $first_name;
	private $last_name;
	private $admin;
	
	public function __construct($mail, $password, $first_name, $last_name, $admin)
	{
		$this->_mail = $mail;
		$this->_password = $password;
		$this->_first_name = $first_name;
		$this->_last_name = $last_name;
		$this->_admin = $admin;
	}
	
	public static function modification($newuser)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		if(!empty($_POST["envoyer"]))
		{
			$id = $_SESSION['utilisateur_id'] ;
		
			$newuser = $_POST["newuser"];
		
			$sql  = 'UPDATE users SET last_name="'.$newuser.'" WHERE user_id = '.$id.' ';
			$result = $db->prepare($sql);
			$columns = $result->execute();
		}
		if(!empty($_SESSION))
		{
			$id = $_SESSION['utilisateur_id'] ;
			$sql = 'SELECT last_name ,first_name , mail, password FROM users WHERE user_id = '.$id.' ';
			$result = $db->prepare($sql);
			$row = $result->execute();
			$row = $result->fetch();

			echo "Votre nom :".$row["last_name"].'</br>' ;
			echo "Votre prenom :".$row["first_name"].'</br>' ;
			echo "Votre mail :".$row["mail"].'</br>' ;
			echo "Votre mdp :".$row["password"].'</br>' ;
	
	
		}
		else{
			echo "pas de résultat" ;
		}

		
	}
	
	
	public static function inscription($mail, $password, $first_name, $last_name)
	{
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
		$db->query('SET NAMES utf8');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
		
		
		$sql = $db->prepare("INSERT INTO users(mail, password, first_name, last_name) VALUES (:mail, :password, :first_name, :last_name)");
		$valeursparam = array(":mail"=>$mail,":password"=>md5($password),
		":first_name"=>$first_name,
		":last_name"=>$last_name);
		$sql->execute($valeursparam);
	}
	
	/*public function before_connexion()
	{
		if(isset($_POST['envoyer']))
		{
			$mail = $_POST['mail'];
			$password = $_POST['password'];

			$unuser = new user($mail, $password);

	$unuser->connexion();
	}
	}*/
	

	
	
	
	
	public static function connexion($mail, $password)
	{
	
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$sql ="SELECT COUNT(*) AS nb, user_id, mail, password, first_name, last_name FROM users WHERE password = '".md5($password)."' AND mail = '".$mail."'";
		$result = $db->prepare($sql);
		$columns = $result->execute();
		$columns = $result->fetch();
		$nb = $columns['nb'];
		if($nb == 1)
		{
			$_SESSION['utilisateur_id'] = $columns['user_id'];
			$_SESSION['mail'] = $columns['mail'];
			$_SESSION['password'] = $columns['password'];

			header('location: /seeit/');
			exit;
			
		}

		else
		{
			echo "vos identifiants sont erronés";
		}
	}

	
	public static function afficher_compte()
	{
	$password = $_SESSION['password'];
	$mail = $_SESSION['mail'];
try
	{
		$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
		$db->query('SET NAMES utf8');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql ="SELECT * FROM users WHERE password = '".$password."' AND mail = '".$mail."'";
		$sql = $db->prepare($sql);
		$sql->execute();


	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	if(!empty($_SESSION['utilisateur_id']))
	{
		
		$id = $_SESSION['utilisateur_id'] ;
$sql = 'SELECT last_name, first_name, mail, password, avatar FROM users WHERE user_id = '.$id.'  ';
$result =$db->prepare($sql);
$row = $result->execute();
$row = $result->fetch();
		

		echo "<div class='row content'>";
		
		echo "<div class='small-8 large-8 columns'>";
		echo "<h1 class='columns large-12 center' >VOTRE COMPTE</h1>";
		echo "<div id='infocompte' class='columns small-12 large-12 center'>";
		echo "<strong>Votre nom : </strong>".$row["last_name"].'</br>' ;
		echo "<strong>Votre prenom : </strong>".$row["first_name"].'</br>' ;
		echo "<strong>Votre mail : </strong>".$row["mail"].'</br>' ;
		echo "</div>";
		echo "<a href='/seeit/modifiercompte' class='button expand' style='margin-top: 68px' >Modification du compte</a>";
		echo "</div>";
		echo "<div class='small-4 large-4 columns'>";
		echo "<img src='".$row["avatar"]."' id='photoavatar'/>" ;
		echo "</div>";
		echo "</div>";
}
else{
	echo "pas de résultat" ;
}
}

	public static function deconnexion ()
	{
		session_destroy();
		header('location: /seeit/');
		exit;
	}
	
	public function getLastName()
	{
		return $this->_last_name ;
	}
	
	public function getFirstName()
	{
		return  $this->_first_name ;
	}
	
	public function getMail()
	{
		return $this->_mail ;
	}
	
	public function getPassword()
	{
		return $this->_password ;
	}
	
	public function setLastName($newlastname)
	{
		$this->_last_name = $newlastname;
	}
	
	public function setFirstName($newfirstname)
	{
		$this->_first_name = $newfirstname ;
	}
	
	public function setMail ($newmail)
	{
		$this->_mail = $newmail;
	}
	
	public function setPassword ($newpassword)
	{
		$this->_password = $newpassword ;
	}
		

	}?>