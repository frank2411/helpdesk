<?php 
  require_once("Config.php");
  require_once("Desk.php");
  require_once("TemplateLoader.php");
  $Desk = new Desk();
  
  echo "<pre>";
  die(print_r($Desk->catchGetRequest()));
  
  $Load = TemplateLoader::getInstance()->getTemplatePath();  
  $Desk->getHead($request);
  $Desk->getContent($Load);
?>
