<?php class Image {

	private $photo_id;
	private $photo_src;
	private $user_id;
	private $title;
	private $description;
	private $categorie;
	private $size;
	private $color;

	public function __construct($photo_id, $photo_src, $user_id, $title, $description, $categorie, $size, $color){
       $this->_photo_id = $photo_id;
       $this->_photo_src = $photo_src;
       $this->_user_id = $user_id;
       $this->_title = $title;
       $this->_description = $description;
       $this->_categorie = $categorie;
       $this->_size = $size;
       $this->_color = $color;
   }

   public function getPhotoId ()
   {
   	return $this->_photo_id;
   }

   public function getPhotoSrc ()
   {
   	return $this->_photo_src;
   }

   public function getUserId ()
   {
   	return $this->_user_id;
   }

   public function getTitle ()
   {
   	return $this->_title;
   }

   public function getDescription ()
   {
    return $this->_description;
   }

   public function getCategorie ()
   {
    return $this->_categorie;
   }

   public function getSize ()
   {
    return $this->_user_id;
   }

   public function getColor ()
   {
    return $this->_color;
   }
}

  public function takeOneImage ($photo_id)
  {
    //Select * From photos Were photo_id = $photo_id

  public function takeAllImage ()  }

  {
    //Select * From photos
  }

  public function takeImageCategorie ($categorie)
  {
    //Select * From photos Where categorie = $categorie
  }

  public function takeImageSize ($size)
  {
    //Select * From photos Where size = $size
  }

  public function takeImageColor ($color)
  {
    //Select * From photos Where color = $color
  }

  public function addImage ($photo_src, $user_id, $title, $description, $categorie, $size, $color)
  {

  }