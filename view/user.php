<!DOCTYPE html>
<html>
<?php
foreach($donnees as $donnees)
{
?>
        <div class="small-2 large-4 columns content_img">
          <img src="<?php echo $this->data["donnees"]["photo_src"] ;?>"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id='<?php echo $this->data["donnees"]["photo_id"] ; ?>"><p class="titre"><?php echo $this->data["donnees"]["title"] ;?></p></a>
            <a href="/seeit/addfavoris?photo_id='<?php echo $this->data["donnees"]["photo_id"] ;?>'"> <div class="fav"><img class="ico_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>
  <?php
	}
	?>
</html>