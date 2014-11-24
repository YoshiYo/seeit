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
	
	public static function inscription($mail, $password, $first_name, $last_name)
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
		
		
		$sql = $db->prepare("INSERT INTO users(mail, password, first_name, last_name) VALUES (:mail, :password, :first_name, :last_name)");
		$valeursparam = array(":mail"=>$mail,":password"=>$password,
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
		
		$sql ="SELECT * FROM users WHERE password = '".$password."' AND mail = '".$mail."'";
		$sql = $db->prepare($sql);
		$sql->execute();
	}

	public static function deconnexion ()
	{
		session_destroy();
		header('location: /seeit/');
		exit;
	}
}