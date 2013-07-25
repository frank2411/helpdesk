<?php

class Desk {

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
  /*END OF QUERIES FUNCTIONS*/  
  
  
  //catch the get request
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
  
  public function getNotApproved(){
    $query = "SELECT * FROM not_approved";
    $row = $this->select($query);
    return $row;
  }
  
  public function getCatList(){
    $query = "SELECT * FROM category_list";
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
  
  public function getCurrentCatName(){
		$param = $this->getParam(0);
    $query = "SELECT cat_name FROM category_list WHERE cat_slug='".$param."'";
    $row = $this->fetchRow($query);
    return $row->cat_name;
  }
  
  public function getCurrentPostTitle(){
    $param = $this->getParam(0);
    $query = "SELECT title FROM posts WHERE url='".$param."'";
    $row = $this->fetchRow($query);
    return $row->title;
  }

  public function getPost(){
    $param = $this->getParam(0);
    $query = "SELECT * FROM posts WHERE url='".$param."'";
    $post = $this->fetchRow($query);
    return $post;
  }
  
  public function cutLongText(){}
  
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
  
  
  
}



?>
