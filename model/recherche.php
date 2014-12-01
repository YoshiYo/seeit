<?php
class Recherche {

		
	public static function search_photo ($s)	
    {
        try
	{
		$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
		$db->query('SET NAMES utf8');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
        
    $request = NULL;
    $request = 'SELECT * FROM photos NATURAL JOIN users WHERE title LIKE "%'.$s.'%" OR categorie LIKE "%'.$s.'%"';
        $request = $db->prepare($request);
		$request->execute();
        $datas=array();  
        
    if ($request != false) {
        while($row = $request->fetch()){
            $datas[] = $row;
            echo '
            <div class="row content">
            <h3>'.$row['title'].'</h3> par '.$row["last_name"].' <br/> <b>Catégorie:</b> '.$row["categorie"].'<br/><b>Couleur:</b> '.$row["color"].'<br/>
            <div class="small-2 large-4 columns content_img">
                  <img src="'.$row["photo_src"].'"/>
                    <div class="hover_img">
                    <p>'.$row["title"].'</p>
                    </div>
                </div>
            </div>';
        }
    }
        $request->closeCursor();
    }

    public static function search_user ($s)	
    {
        try
    {
        $db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
        $db->query('SET NAMES utf8');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
        
    $request = NULL;
    $request = 'SELECT * FROM users WHERE last_name LIKE "%'.$s.'%" OR first_name LIKE "%'.$s.'%"';
        $request = $db->prepare($request);
        $request->execute();
        $datas=array();  
        
    if ($request != false) {
        while($row = $request->fetch()){
            $datas[] = $row;
            echo '
            <div class="row content">
            <div class="columns large-6">
            <img src="img/'.$row["avatar"].'"/>
            </div>
            <div class="columns large-6">
            <a href="/seeit/user?user_id='.$row['user_id'].'"><h3>'.$row['last_name'].' '.$row['first_name'].'</h3></a>
            </div>
            </div>';
        }
    }
        $request->closeCursor();
    }
}

?> 