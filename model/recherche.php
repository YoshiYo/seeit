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
    $request = 'SELECT * FROM photos WHERE title LIKE "%'.$s.'%" OR categorie LIKE "%'.$s.'%"';
        $request = $db->prepare($request);
		$request->execute();
        $datas=array();  
        
    if ($request != false) {
        while($row = $request->fetch()){
            $datas[] = $row;
            echo '<div class="small-2 large-4 columns content_img">
                  <img src="'.$row["photo_src"].'"/>
                    <div class="hover_img">
                    <p>'.$row["title"].'</p>
                    </div>
                </div>';
        }
    }
        $request->closeCursor();
    }

    public static function search_user ($title, $categorie)	
    {
	 $s = $_GET['s'];
        
    $request = NULL;
    $request = 'SELECT * FROM users WHERE $last_name LIKE "%'.$s.'%" OR $first_name LIKE "%'.$s.'%"';
    
        $datas=array();  
        $reponse = $db->query($request);
    if ($reponse != false) {
        while($row = $reponse->fetch()){
            $datas[] = $row;
        }
        $reponse->closeCursor();
    }
    }
}

?> 