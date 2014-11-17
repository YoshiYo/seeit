<?php

require_once "/autoload.inc.php";
require_once "bdd.php";

class user{
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
	
	public function inscription()
	{
		$sql = $db->prepare("INSERT INTO users(mail, password, first_name, last_name, admin) VALUES (:mail, :password, :first_name, :last_name, :admin)");
		$sql = bindParam(":mail", $this->_mail);
		$sql = bindParam(":password", $this->_password);
		$sql = bindParam(":first_name", $this->_first_name);
		$sql = bindParam(":last_name", $this->_last_name);
		$sql = bindParam(":admin", $this->_admin);
		$sql->execute();
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
	
	public function connexion($mail, $password)
	{
		
		$sql2 = $db->prepare("SELECT * FROM users WHERE mail = ".$this->_mail." AND password = ".$this->_password);
		$sql2->execute();
	}
	
}