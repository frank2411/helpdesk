<?php
class ClassLoader {
	
  static protected $instance = null;
  private $_personalClass = "";

  function __construct($className){
    $class = ucwords(str_replace("-"," ",$className));
    $class = str_replace(" ","_",$class);		
    $class = $this->existsClass($class);
  }
	
  private function existsClass($className){
    if($className == "Home"){$className = "Index";}
    $found = stream_resolve_include_path("$className.php");
    if ($found !== FALSE) {
      $this->setPersonalClass($className);
    } else{
      return false;
    }
  }
  
  private function setInstance($instance){
    $this->_personalClass = $instance;
    return $this;
  }
  
  private function returnInstance(){
    return $this->_personalClass;
  }
  
  private function setPersonalClass($className){
    include($className.".php");
    $instance = new $className();
    $this->setInstance($instance);		
  }
  
  public function loadPersonalClass(){
    $instance = $this->returnInstance();
    return $instance;		
  }
    
  public static function getInstance($className) {
    if (is_null(self::$instance)) { 
      self::$instance = new self($className); 
    }
    return self::$instance;
  }

}
?>
