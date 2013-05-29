<?php
  
  //this file acts like a zend bootstrap file
  require_once("loader.php");
  require_once("desk.php");
  $desk = new Desk();
  $load = Loader::getInstance()->getTemplatePath();  
  $desk->getHead($request);
  $desk->getContent($load);
  
  
?>


