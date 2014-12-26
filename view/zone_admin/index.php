  <div class="row content">
    <form method="post" action="">
      <input type="submit" value="Afficher les utilisateurs" class="button [tiny small large] con" name="envoyer"/>
    </form>
</div>
<div class="row content">
  <?php

    if (!empty($users))
    {
      foreach ($users as $user) {
        echo $user["user_id"],' - '.$user["last_name"].'<input type="button" class="supprimer" value="-"></br>';
      }
    }?>
  </div>