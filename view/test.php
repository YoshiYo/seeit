<?php if( !empty($message) ) 
{
  if ($message == 1){
    echo '<div data-alert class="alert-box success radius">
    This is a success alert with a radius.
    <a href="#" class="close">&times;</a>
    </div>';
  }
}
?>   
<div class="row content">
  <!-- Debut du formulaire -->
  <form enctype="multipart/form-data" action="" method="post">
    <div class="large-4 columns">
      <label>Titre : <input required type="text" name="title"/>
      </div>
      <div class="large-4 columns">
        <label>Description : <textarea required name="description"></textarea></label>
      </div>
      <div class="large-4 columns">
        <label>Catégorie : 
          <select required name="categorie">
            <option value="paysage">Paysage</option>
            <option value="art">Art</option>
            <option value="animal">Animal</option>
            <option value="sport">Sport</option>
            <option value="immobilier">Immobilier</option>
            <option value="musique">Musique</option>
            <option value="autre">Autres</option>
          </select>
        </label>
      </div>
      <div class="large-4 columns">
        <p>
          <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Image : </label>
          <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
          <input required name="fichier" type="file" id="fichier_a_uploader" />
        </p>
      </div>
      <input type="submit" name="submit" value="Valider" class="button small" />
    </form>
  </div>