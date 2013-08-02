<?php 
	
	class Profile extends Desk{
		
		function __construct()
		{
			$userPageName = $this->getParam(0);
			$user = $this->user();
			if(!$user->isLogged() || $user->getUsername() != $userPageName)
			{
				header("Location:/login/");
				die();
			}			
		}
		
		public function getMyPost()
		{
		
		}
		
		
	
	}


?>
