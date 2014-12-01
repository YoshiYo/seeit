<?php



class User{
	private $id;
	private $mail;
	private $password;
	private $first_name;
	private $last_name;
	private $admin;
    private $avatar;
	
	public function __construct($mail, $password, $first_name, $last_name, $admin, $avatar)
	{
		$this->_mail = $mail;
		$this->_password = $password;
		$this->_first_name = $first_name;
		$this->_last_name = $last_name;
		$this->_admin = $admin;
        $this->_avatar = $avatar;
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
	
	
	public static function inscription($mail, $password, $first_name, $last_name, $avatar)
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
		
		
		$sql = $db->prepare("INSERT INTO users(mail, password, first_name, last_name, avatar) VALUES (:mail, :password, :first_name, :last_name, :avatar)");
		$valeursparam = array(":mail"=>$mail,":password"=>md5($password),
		":first_name"=>$first_name,
		":last_name"=>$last_name,
        ":avatar"=>$avatar);
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

		echo "Votre nom :".$row["last_name"].'</br>' ;
		echo "Votre prenom :".$row["first_name"].'</br>' ;
		echo "Votre mail :".$row["mail"].'</br>' ;
        echo "Votre avatar :".$row["avatar"].'</br>' ;
		//echo "Votre mdp :".$row["password"].'</br>' ;
		echo "<a href='/seeit/modifiercompte'>modification du compte</a>";
	
}
else{
	echo "Vous n'êtes pas inscrit" ;
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
    public function getAvatar()
	{
		return $this->_avatar ;
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
    public function setAvatar($newavatar)
	{
		$this->_avatar = $avatar;
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