<div class="explorer">
	<?php 	
	include "model/get_img.php";
	while ($donnees = $img->fetch()) 
		{ ?>
	<div class="ligne3">
		<div class="large-4 columns">
			<div class="art3">
				<?php
				$i=0; 
				while ($i < 3) { ?>

				<img src="img/<?php echo $donnees['photo_src'];?>"/>
				<div class="img4">
					<p>DESCRIPTION</p>
				</div><?php } ?>
			</div>
		</div>
    </div> <?php } ?>
</div>