<?php 
 if ($this->data["donnees3"]['nb'] != 0){
 ?>
    
    <div class='row content'>
    <h3>FAVORIS : </h3>
<?php
    foreach($this->data["requete2"] as $requete2)
    {?>
        <div class="small-2 large-4 columns content_img">
         <img class="favoris" src="img/<?php echo $this->data["requete2"]["photo_src"];?>"/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id=<?php echo $this->data["requete2"]["photo_id"]?>"><p class="titre"><?php echo $this->data["requete2"]["title"]; ?></p></a>
            <a href="/seeit/delfavoris?photo_id=<?php echo $this->data["requete2"]["photo_id"]; ?>"><div class="fav"><img class="ico_del_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>
<?php
    } ?>
   </div>
 <?php } ?>
    <div class='row content'>
    <h3>EXPLORER : </h3>
	<?php
	foreach ($this->data["requete"] as $requete)
{?>

        <div class="small-2 large-4 columns content_img">
          <img src="img/<?php echo $this->data["requete"]["photo_src"]; ?> "/>
          <div class="hover_img">
            <a href="/seeit/image?photo_id=<?php echo $this->data["requete"]["photo_id"]; ?>"><p class="titre"><?php echo $this->data["requete"]["title"]; ?></p></a>
            <a href="/seeit/addfavoris?photo_id=<?php echo $this->data["requete"]["photo_id"]; ?>"> <div class="fav"><img class="ico_fav" src="img/fav.png" style="width:100%;"></div></a>
          </div>
        </div>
		<?php
  }
  ?>
 </html>