<?php 

	class Users{
		
		private $_userId;
		private $_username;
		private $_logged;
		private $_role;
		
		function __construct()
		{
			session_start();
			if(isset($_SESSION["user"])){
				$userObj = $_SESSION["user"];
				$this->_userId = $userObj->userId;
				$this->_username = $userObj->username;
				$this->_logged = $userObj->logged;
				$this->_role = $userObj->role;
			}
		}
		
		public function getUsername()
		{
			return $this->_username;
		}
		
		public function isLogged()
		{
			return $this->_logged;
		}
		
		public function getUserId()
		{
			return $this->_userId;
		}
		
		public function setIdentity($id,$username,$role){			
			$userLogged = new stdClass();
			$userLogged->logged = 1;
			$userLogged->userId = $id;
			$userLogged->username = $username;
			$userLogged->role = $role;
			$_SESSION["user"] = $userLogged;			
		}

		public function logOut()
		{
			unset($_SESSION["user"]);
			session_destroy();
		}
	
	}








?>
