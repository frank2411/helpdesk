<?php 
	$user = $this->user();
	if(!$user->isLogged()){
		header("Location:/");
	} else {
		$user->logOut();
	}
?>
