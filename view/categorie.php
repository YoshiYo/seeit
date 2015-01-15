<!DOCTYPE html>
<html>

    <div class='row content'>
    <h3>EXPLORER : </h3>
<?php
	while ($donnees = $this->data["requete"]->fetch())
{?>

        <div class="small-2 large-4 columns content_img">
          <img src="img/<?php echo $donnees["photo_src"];?>"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id=<?php echo $donnees["photo_id"]; ?>"><p class="titre"><?php echo $donnees["title"]; ?></p></a>
            <a href="/seeit/addfavoris?photo_id=<?php echo $donnees["photo_id"]; ?>"> <div class="fav"><img class="ico_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>
		<?php
  }
  ?>
  </html>