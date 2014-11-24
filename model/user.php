<?php



class User{
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
		session_start();
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
<<<<<<< HEAD
		}
=======

		
		$sql ="SELECT COUNT(*) AS nb, user_id, mail, password, first_name, last_name FROM users WHERE password = '".$password."' AND mail = '".$mail."'";

>>>>>>> 44428d16d25b5d9857a96119aa243ad4d49ed3d5

		$sql ="SELECT COUNT(*) AS nb, user_id, mail, password, first_name, last_name FROM users WHERE password = '".md5($password)."' AND mail = '".$mail."'";

		$result = $db->prepare($sql);
		$columns = $result->execute();
		$columns = $result->fetch();
		$nb = $columns['nb'];
		if($nb == 1)
		{
			session_start();
			$_SESSION['utilisateur_id'] = $columns['user_id'];
			$_SESSION['mail'] = $columns['mail'];
			$_SESSION['nom'] = $columns['last_name'];
			$_SESSION['prenom'] = $columns['first_name'];
			$_SESSION['password'] = $columns['password'];
			echo "<a href='/seeit/infocompte'>Information sur mon compte</a>";
			$sql ="SELECT * FROM users WHERE password = '".$password."' AND mail = '".$mail."'";
			$sql = $db->prepare($sql);
			$sql->execute();
			header('location: /seeit/');
					}
<<<<<<< HEAD
		else
		{
			echo "vos identifiants sont erronés";
		}
	}
=======
			else
			{
				echo "vos identifiants sont erronés";
			}

		
	}}
>>>>>>> 44428d16d25b5d9857a96119aa243ad4d49ed3d5
	
	public static function afficher_compte()
	{
	session_start();
try
	{
		$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
		$db->query('SET NAMES utf8');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql ="SELECT * FROM users WHERE password = '".md5($password)."' AND mail = '".$mail."'";
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
$sql = 'SELECT last_name, first_name, mail, password FROM users WHERE user_id = '.$id.'  ';
$result =$db->prepare($sql);
$row = $result->execute();
$row = $result->fetch();

		echo "Votre nom :".$row["last_name"].'</br>' ;
		echo "Votre prenom :".$row["first_name"].'</br>' ;
		echo "Votre mail :".$row["mail"].'</br>' ;
		echo "Votre mdp :".$row["password"].'</br>' ;
		echo "<a href='/seeit/modifiercompte'>modification du compte</a>";
	
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
	
}