<!DOCTYPE html>
<html>
<div class="row content">
	<h2><?php echo $this->data["donnees"]["title"] ;?></h2>
	<div id="sphere" style="width: 100%; height: 600px;"></div>
	<script type="text/javascript">
	new Photosphere("img/<?php echo $this->data["donnees"]["photo_src"] ; ?>").loadPhotosphere(document.getElementById("sphere"));
	</script>
</div>
</html>
