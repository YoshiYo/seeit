<?php

/*require_once "/autoload.inc.php";

if(isset($_POST['envoyer']))
{
	$mail = $_POST['mail'];
	$password = $_POST['password'];

	$unuser = new user($mail, $password);

	$unuser->connexion();
}*/
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body style="margin-top=-17px;">
<form method="post" action="">
            <div class="row">
              <div class="large-4 columns2 required" required>
                <label>E-mail :
                  <input type="text" name="mail"/>
                </label>
              </div>
              <div class="large-4 columns2" required>
                <label>Mot de passe :
                  <input type="password" name="password"/>
                </label>
              </div>
              <div class="large-4 columns2">
                <input type="submit" value="Valider" class="button [tiny small large] con" name="envoyer"/>
              </div>
            </div>
          </div>
        </form>
</body>
</html>