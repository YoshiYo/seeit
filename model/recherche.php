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
     return $request;
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
    return $request;
}
}

?> 