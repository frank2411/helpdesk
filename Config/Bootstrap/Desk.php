<?php

class Desk {

	/*
	 * 
	 * campi tabelle : users => roles = admin | guest | moderator | writer
	 * 							 : post => status = approved | waiting | flagged | depublished
	 * 
	 * 
	*/

  const DEFAULT_JS_PATH = "/js/";

  //get default db connection
  private function getDefaultDbConnection(){
    $host = DESK_HOST;
    $user = DESK_USERNAME;
    $pass = DESK_DBPASSWD;
    $dbName = DESK_DBNAME;
    return @mysqli_connect($host,$user,$pass,$dbName);
  }
  
  /*QUERIES FUNCTIONS*/
  public function select($query){
    $result = mysqli_query($this->getDefaultDbConnection(),$query);
    $results = array();
    while ($row = mysqli_fetch_assoc($result)){
      $results[] = $row;
    }
    $result = $this->convertToObj($results);
    return $result;
  }
  
  public function fetchRow($query){
    $result = mysqli_query($this->getDefaultDbConnection(),$query);
    $row = mysqli_fetch_assoc($result);
    $result = $this->convertToObj($row);
    return $result;
  }
  
  public function insert($query){
    $result = mysqli_query($this->getDefaultDbConnection(),$query);
  }
  
	public function getPosts(){
		if($this->isCategory()){			
			$param = $this->getParam(0);
			$param = mysql_real_escape_string($param);
			$query = "
				SELECT posts.*,categories.id,categories_relationship.*
				FROM posts 
				INNER JOIN (categories,categories_relationship)
				ON (categories_relationship.post_id = posts.id AND categories_relationship.cat_id = categories.id )
				WHERE categories.url = '".$param."' 
				AND status = 'approved'
			";
			$row = $this->select($query);
			return $row;
		}
	}
	
	/*
	 * SELECT 
			posts.*,
			categories.id AS catId,
			categories_relationship.*,
			tags.name AS tagName,
			tags.url AS tagUrl,
			tags.id,
			tags_relationship.tag_id
			FROM posts 
			INNER JOIN (categories,categories_relationship,tags,tags_relationship)
			ON (
			categories_relationship.post_id = posts.id 
			AND 
			categories_relationship.cat_id = categories.id 
			AND 
			tags.id = tags_relationship.tag_id
			AND 
			tags_relationship.post_id = posts.id
			) WHERE posts.id = 2
	*/
	
	public function getNotApproved(){	
		$param = $this->getParam(0);
		$param = mysql_real_escape_string($param);
		$query = "
			SELECT *
			FROM posts 
			WHERE status = 'waiting'
			";
		$row = $this->select($query);
		return $row;
	}
	
	public function getTags($postId){
    $query = "
			SELECT tags.name,tags.url,tags_relationship.* 
			FROM tags
			INNER JOIN tags_relationship ON tags.id = tags_relationship.tag_id
			WHERE tags_relationship.post_id = '".$postId."'
    ";
    $row = $this->select($query);
    return $row;
		
	}
	
  public function getCurrentCatName(){
		$param = mysql_real_escape_string($this->getParam(0));
    $query = "SELECT name FROM categories WHERE url='".$param."'";
    $row = $this->fetchRow($query);
    return $row->name;
  }
  
  public function getCurrentPostTitle(){
    $param = mysql_real_escape_string($this->getParam(0));
    $query = "SELECT title FROM posts WHERE url='".$param."'";
    $row = $this->fetchRow($query);
    return $row->title;
  }

  public function getPost(){
    $param = mysql_real_escape_string($this->getParam(0));
    $query = "SELECT * FROM posts WHERE url='".$param."'";
    $post = $this->fetchRow($query);
    return $post;
  }
  
	public function getCatList(){
    $query = "SELECT * FROM categories";
    $row = $this->select($query);
    return $row;
  }
	public function getCatBySlug($slug){
    $query = "SELECT * FROM category_list WHERE cat_slug='".$slug."'";
    $row = $this->fetchRow($query);
    return $row;
  }
  
  public function getCatByName($name){
    $query = "SELECT * FROM category_list WHERE cat_slug='".$name."'";
    $row = $this->fetchRow($query);
    return $row;
  }

  /*CONVERT ARRAY TO AN OBJECT*/
  function convertToObj($array) {
    $object = new stdClass();
    //$object = (object)$array;
    foreach ($array as $key=>$value) {
      $object->$key = $value = is_array($value) ? $this->convertToObj($value) : $value;
    }
    return $object;
  }
  /*END OF CONVERT ARRAY TO AN OBJECT*/  
  
  
  
  /*END OF QUERIES FUNCTIONS*/  
  
  
  //catch the get request and params functions
  public function catchGetRequest(){
    return $_GET["request"];
  }
  
  public function getParams(){
		$params = $_GET["params"];
		preg_match('/([^\/].*[^\/])/i', $params, $results);
		if(!empty($results[1])){
			$params = str_replace("/"," ",$results[1]);
			$params = explode(" ",$params);
			return $params;
		} else {
			return false;
		}
	}
	
	//modify 
	public function getParam($paramIndex){
		$params = $this->getParams();
		return $params[$paramIndex];	
	}
  //catch the get request and params functions
	
  //gets head
  public function getHead($meta){	
   include("layout/head.php");    
  }
  
  //gets header
  public function getHeader(){	
   include("layout/header.php");    
  }
  
  //gets content
  public function getContent($templatePath){
   include("layout/content.php");
  }
  
  //gets footer
  public function getFooter(){
   include("layout/footer.php");        
  }
  
  //gets sidebar
  public function getSidebar(){
   include("layout/sidebar.php");        
  }
  
  //gets sidebar.php
  public function getLayout($path){
   include("layout/".$path.".php");        
  }
  
  //get a list or a customized content for a layout
  public function getPartial($path,$vars){
    include("partials/".$path.".php");
  }
  
  //get a widget for the sidebar
  public function getWidget($path){
    include("partials/widgets/".$path.".php");
  }
  
  /*PAGES FUNCTIONS*/
  public function isHome(){
    $request = $this->catchGetRequest();
    if (!$request) {return true;}
  }
  
  public function isCategory(){
    $request = $this->catchGetRequest();
    if ($request == "category") {return true;}
  }
  
  public function isSingle(){
    $request = $this->catchGetRequest();
    if ($request == "post") {return true;}
  }
  
  public function isLogin(){
    $request = $this->catchGetRequest();
    if ($request =="login") {return true;}
  }
  
  public function isRegister(){
    $request = $this->catchGetRequest();
    if ($request =="register") {return true;}
  }

  public function getPageTitle(){
    $request = $this->catchGetRequest();
    if (!$request){
      echo "<div class=\"breadcrumb\">
						<span class=\"crumb\">Home Page</span>
						</div>";
    } else if ($this->isCategory()){      
      echo "<div class=\"breadcrumb\">
							<span class=\"crumb\">Categoria</span>
							<span class=\"crumb\">".$this->getCurrentCatName()."</span>
						</div>"; 
    } else {
      echo ucfirst($request);
    }		
  }
	
  public function includeScript($name){
    echo '<script type="text/javascript" src="'.self::DEFAULT_JS_PATH.$name.'"></script>';
  }
	
  /*END OF PAGES FUNCTIONS*/
  
  
  /*DA INTEGRARE*/
  
	public function cutLongText(){}
	  
  /*
		public function parsePermalink($permalink,$date)
		{
			$permalink = trim($permalink);
			$permalinkBase = "/blog/";
			$finalDate = preg_replace('/^(\d+)[-](\d+)(.*)/i', '$1/$2/', $date);			
			$permalink =	str_replace(
				array("."," :",":"," ,",","," ?","?","'","\""," "),
				array("","","","","","","","","","-"),
				$permalink
			);
			$permalink = strtolower($this->stripAccents($permalink));
			return $permalinkBase.$finalDate.$permalink;		
		}
		
		public function stripAccents($permalink){
			setlocale(LC_ALL,'en_US.utf8');
			$permalink = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $permalink);
			return $permalink;
		}  
		* 
		* 
	*/

}



?>
