<?php 
	
  class Profile extends Desk{
	  
    function __construct()
    {
      $userPageName = $this->getParam(0);
      $user = $this->user();
      if(!$user->isLogged() || $user->getUsername() != $userPageName)
      {
	header("Location:/login/");
	die();
      }			
    }

    public function getMyPost()
    {
      $query = "		  
	SELECT posts.*,categories.name AS catName , categories.url AS catUrl
	FROM posts 
	INNER JOIN (categories,categories_relationship)
	ON (categories_relationship.post_id = posts.id 
	AND categories_relationship.cat_id = categories.id)
	WHERE posts.author = '".$this->user()->getUserId()."'
	ORDER BY posts.id DESC
      ";
      $row = $this->query($query);
      return $row;
    }
	  
	  
  
  }


?>
