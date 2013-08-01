<?php $user = $this->user(); ?>
<?php $this->getWidget("category-list"); ?>
<?php $this->getWidget("add-post-button"); ?>
<?php 
	
	if(!$user->isLogged()){
		$this->getWidget("log-reg-link");		
	} else {
		$this->getWidget("logout-button");		
	}
	
?>

