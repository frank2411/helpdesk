<?php 
	
  class Logout extends Desk{
    
    function __construct()
    {
      if(!$this->user()->isLogged()){
	header("location: http://www.helpdesk.it/");
      } else {
	$this->user()->logOut();
	//$this->setSessionMessages("Logout effettuato con successo!");
	header("location: /");
	die();
      }
    }

  }

?>
