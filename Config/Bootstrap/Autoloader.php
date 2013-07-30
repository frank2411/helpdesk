<?php
  /*Hacks to include the Personal And Helpers folder with include path*/
	define("APPLICATION_PATH",realpath("../helpdesk/Personal"));  
	define("HELPERS_PATH",realpath("../helpdesk/Personal/Helpers"));  
	define("HELPERS_PATH",realpath("../helpdesk/Personal/Widgets"));  
	define("CURRENT_PATH",getcwd());//get current workin directory
	$paths = array(APPLICATION_PATH,HELPERS_PATH,CURRENT_PATH);
	set_include_path(implode($paths,PATH_SEPARATOR));
	
  require_once("Config.php");
  require_once("Desk.php");
  require_once("TemplateLoader.php");
  require_once("ClassLoader.php");
  
  /*Load default template and layout and related classes*/
  $Desk = new Desk();
  $Load = TemplateLoader::getInstance()->getTemplatePath();
  $ClassLoader = ClassLoader::getInstance($Load)->loadPersonalClass();
  if ($ClassLoader){
		$Desk = $ClassLoader;
	}
  
  $Desk->getHead($request);
  $Desk->getContent($Load);
?>
