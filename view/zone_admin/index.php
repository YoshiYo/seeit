  <div class="row content">
    <form method="post" action="">
      <input type="submit" value="Afficher les utilisateurs" class="button [tiny small large] con" name="envoyer"/>
    </form>
  </div>
  <div class="row content">
    <?php if (!empty($users)): ?>
    <strong> Voici la liste des utilisateurs du site : </strong>
    <br></br>
  <ul>
    <?php foreach ($users as $user): ?>
    <li> 
      <?php echo $user["user_id"]?> - <?php echo $user["last_name"] ?>
      <form method="post" action="<?php echo $app->urlFor('remove')?>">
        <input type="submit" class="supprimer" value="-"/> 
        <input type="hidden" name="userid" value="<?php echo $user["user_id"] ?>"/>
      </form>
    </li>
  <?php endforeach ?>
</ul>
<?php endif ?>
</div>