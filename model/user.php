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

	public static function modificationadmin()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
			
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		$sql = $db->prepare('SELECT * FROM users ORDER BY user_id');
		$sql->execute();
		$users = $sql->fetchAll();
		return $users;
		/*while ($user = $sql->fetch()) {
			echo $user["user_id"],' - '.$user["last_name"].'<input type="button" class="Supprimer" value=""></br>';
		}
*/		
	}

	public static function removeuser($user_id)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
			
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		$sql = $db->prepare('DELETE FROM users WHERE user_id='.$user_id.'');
		$sql->execute();
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
			$sqlf = 'SELECT last_name ,first_name , mail, password FROM users WHERE user_id = '.$id.' ';
			$resultf = $db->prepare($sqlf);
			$rowf = $resultf->execute();
			$rowf = $resultf->fetch();
			
			if(md5($_POST["oldpassword"]) == $rowf["password"])
			{
				if(!empty($_POST["newuser"]))
				{
					$newuser = $_POST["newuser"];
					$sql  = 'UPDATE users SET last_name="'.$newuser.'" WHERE user_id = '.$id.' ';
					$result = $db->prepare($sql);
					$columns = $result->execute();
					echo "nom changé" ; 
				}
				if(!empty($_POST["newuserpr"]))
				{
					$newuserpr = $_POST["newuserpr"];
					$sql2  = 'UPDATE users SET first_name="'.$newuserpr.'" WHERE user_id = '.$id.' ';
					$result2 = $db->prepare($sql2);
					$columns2 = $result2->execute();
					echo "prénom changé" ;
				}
				if(!empty($_POST["newmail"]))
				{
					$newmail = $_POST["newmail"];
					$resetmail  = 'UPDATE users SET mail="'.$newmail.'" WHERE user_id = '.$id.' ';
					$result3 = $db->prepare($resetmail);
					$columns3 = $result3->execute();
					echo "mail changé";
				}
				if(!empty($_POST["newpassword"]))
				{
					$newpassword = $_POST["newpassword"];
					$sql  = 'UPDATE users SET password="'.md5($newpassword).'" WHERE user_id = '.$id.' ';
					$result = $db->prepare($sql);
					$columns = $result->execute();
					echo "mot de passe changé" ;
				}
			

			}else{ echo "Ancien mot de passe érroné ";} 
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
		$sql ="SELECT * FROM users WHERE password = '".md5($password)."' AND mail = '".$mail."'";
		$result = $db->prepare($sql);
		$columns = $result->execute();
		$columns = $result->fetch();
		if ( sizeof($columns) > 0)

		{
				$_SESSION['utilisateur_id'] = $columns['user_id'];
				$_SESSION['mail'] = $columns['mail'];
				$_SESSION['password'] = $columns['password'];
				if ($columns['admin'] == 1)
				{
					$_SESSION['admin'] = true;
				}
				return true;
		}
		return false;
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
	/*if(!empty($_SESSION['utilisateur_id']))
	{*/
		
		$id = $_SESSION['utilisateur_id'] ;
$sql = 'SELECT last_name, first_name, mail, password, avatar FROM users WHERE user_id = '.$id.'  ';
$result = $db->prepare($sql);
$row = $result->execute();
$row = $result->fetch();
return $row;

/*}*/

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

	public static function userGalerie(){
		try
    {
      $db = new PDO('mysql:host=localhost;dbname=seeit', 'root','');
      $db->query('SET NAMES utf8');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

		$user_id = $_GET["user_id"];
		$requete = $db->prepare("SELECT * from photos WHERE user_id = :user_id");
		$valeursParam = array(":user_id" => $user_id);
    	$requete->execute($valeursParam);
    	$donnees = $requete ->fetch();
		return $donnees;

    	
}
}
?>
