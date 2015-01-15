<?php if ($this->data["request"] != false) {
        while($row = $this->data["request"]->fetch()){
            ?>
            <div class="row content">
            <h3><?php echo $row["title"] ?></h3> par <?php echo $row["last_name"]?> <br/> <b>Catégorie:</b> <?php echo $row["categorie"]?>'<br/>
            <div class="small-2 large-4 columns content_img">
            <img src="img/<?php echo $row["photo_src"]?>"/>
            <div class="hover_img">
            <a href="/seeit/image?photo_id='<?php echo $row["photo_id"]?>"><p><?php echo $row["title"] ?></p></a>
            </div>
            </div>
            </div>
            <?php
        }
    }
    
    if ($this->data["request2"] != false) {
        while($row = $this->data["request2"]->fetch()){
            ?>
            
            <div class="row content">
            <div class="columns large-6">
            <img src="img/<?php echo $row["avatar"]?>" style="width:150px;height:150px;"/>
            </div>
            <div class="columns large-6">
            <a href="/seeit/user?user_id=<?php echo $row['user_id']?>"><h3><?php echo $row['last_name']?> <?php echo $row['first_name']?></h3></a>
            </div>
            </div>
            <?php
        }
    }
?>