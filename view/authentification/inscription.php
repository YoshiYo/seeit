<?php
if(isset($_POST['envoyer']))
{
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name = $_POSt['last_name'];
	
	$adduser = new user($mail, $password, $first_name, $last_name);
	
	$adduser->inscription();
	
	header('location

?>


<!DOCTYPE html>
<html>
<head>
</head>

<body>
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
              <div class="large-4 columns2 required" required>
                <label>prenom :
                  <input type="text" name="first_name"/>
                </label>
              </div>
              <div class="large-4 columns2" required>
                <label>nom :
                  <input type="password" name="last_name"/>
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