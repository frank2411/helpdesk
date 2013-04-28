<?php
require_once("magicClass.php");
require_once("config/loader.php");
$desk = new Desk();
$request = $desk->catchGetRequest();
$load = Loader::getInstance()->getTemplatePath();

$desk->getHead($request);
$desk->getContent($load);
	

?>
