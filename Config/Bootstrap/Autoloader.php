<?php 
  require_once("Config.php");
  require_once("Desk.php");
  require_once("TemplateLoader.php");
  $Desk = new Desk();
  
  $Load = TemplateLoader::getInstance()->getTemplatePath();  
  $Desk->getHead($request);
  $Desk->getContent($Load);
?>
