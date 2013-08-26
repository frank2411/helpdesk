<?php
class TemplateLoader{
	
  static protected $instance = null;
  private $_templatePath = "";

 function __construct(){
    $path = preg_replace('/[\/]([a-zA-Z0-9\s_-]+)([\/a-zA-Z0-9\s_-]*)/i', '$1',$_SERVER[REQUEST_URI]);
    $templatePath = $this->existsLayout($path) ? $path : "index" ;		
    $this->setTemplatePath($templatePath);
  }
  
  public static function getInstance() {
    if (is_null(self::$instance)) { 
      self::$instance = new self(); 
    }
    return self::$instance;
  }

  public function getTemplatePath(){
    return $this->_templatePath;
  }

  private function setTemplatePath($path){
    if($path == "index" && $this->existsLayout("home")){
      $path = "home";
    }
    $this->_templatePath = $path;
    return $this;
  }

  private function existsLayout($path){
    if (file_exists ("layout/$path.php")){
      return true;
    } else{
      return false;
    }
  }

}
