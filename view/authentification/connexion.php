<form method="post" action="">
  <div class="row content">
    <?php if ($flash['error']): ?>
    <p class="alert-box alert ">
      <?php echo $flash['error'] ?>
    </p>
  <?php endif ?>
  <div class="large-4 columns">
    <label>E-mail :
      <input type="text" name="mail"  required/>
    </label>
  </div>
  <div class="large-4 columns">
    <label>Mot de passe :
      <input type="password" name="password"  required/>
    </label>
  </div>
  <div class="large-12 columns">
    <input type="submit" value="Valider" class="button [tiny small large] con" name="envoyer"/>
  </div>
  <div class="margin-top large-12 columns">
    <a  href="/seeit/inscription">Si vous n'êtes pas inscrit, inscrivez vous.</a>   
  </div>

</div>
</div>
</form>
