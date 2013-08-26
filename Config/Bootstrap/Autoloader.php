<?php

  require_once("Config.php");
  require_once("Users.php");
  
  //session handler class
  $user = new Users();
  
  $paths = array(APPLICATION_PATH,HELPERS_PATH,CURRENT_PATH);
  set_include_path(implode($paths,PATH_SEPARATOR));
		
  require_once("Desk.php");
  require_once("TemplateLoader.php");
  require_once("ClassLoader.php");
  
  
  /*Load default template and layout and related classes*/
  $Desk = new Desk();
  $Load = TemplateLoader::getInstance()->getTemplatePath();
  //$ClassLoader = ClassLoader::getInstance($Load,$user)->loadPersonalClass();
  $ClassLoader = ClassLoader::getInstance($Load)->loadPersonalClass();
  if ($ClassLoader){
    $Desk = $ClassLoader;
  }
  $Desk->getHead($request);
  $Desk->getContent($Load);
	
?>
