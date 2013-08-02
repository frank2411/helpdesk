<?php
	
	class Register extends Desk{
		
		function __construct(){
			if($this->user()->isLogged()){
				header("Location:/");
				die();
			}
			$post = $this->getPostRequest();			
			if($post["action"] == "register")
			{
				$this->validateData($post);
			}
		}
		
		public function validateData($post)
		{
			$messages = "";
						
			if($post["nickname"] == "") {
				$messages .= "Il campo username non può essere vuoto<br>";
			} 
			
			if($post["email"] == "") {
				$messages .= "Devi inserire un indirizzo email valido!";
			}
			
			if($post["password"] == "") {
				$messages .= "Inserisci una password";			
			}
			
			if("" != $messages) {
				$this->setMessages($messages);
				$this->setStatus(false);
				return false;
			}
			
			$nickname = mysql_real_escape_string($post["nickname"]);
			$email = mysql_real_escape_string($post["email"]);
			$password = mysql_real_escape_string($post["password"]);
			
			
			$checkUsername = $this->checkUsername($nickname);
			if($checkUsername){
				$this->setMessages("Il Nome utente inserito è già in uso");
				$this->setStatus(false);
				return false;
			}
			
			$emailValidation = $this->validateEmail($email);
			if(!$emailValidation){
				$this->setMessages("L indirizzo email inserito non è valido!");
				$this->setStatus(false);
				return false;
			}
			
			$checkEmail = $this->checkEmail($email);
			if($checkEmail){
				$this->setMessages("C'è già un account associato a questo indirizzo email");
				$this->setStatus(false);
				return false;
			}
						
			$newUser = $this->insertNewUser($nickname,$email,$password);			
			$this->setStatus(true);
			
		}
		
		public function insertNewUser($nickname,$email,$password){
			$query="
				INSERT INTO users (email,nickname,password,role)
				VALUES ('".$email."','".$nickname."','".$password."','writer')
			";
			$this->insert($query);
			$newuser = $this->getUserByNickname($nickname);
			$this->user()->setIdentity($newuser->id,$nickname,$newuser->role);
			header("Location:/");
			die();
		}		
		
		private function checkUsername($username)
		{
			$query = "
				SELECT id
				FROM users
				WHERE nickname = '".$username."'
			";
			$row = $this->fetchRow($query);	
			if(empty($row)){
				return false;
			} else {
				return true;
			}
		}
		
		private function checkEmail($email){
			$query = "
				SELECT id
				FROM users
				WHERE email = '".$email."'
			";
			$row = $this->fetchRow($query);
			if(empty($row)){
				return false;
			} else {
				return true;
			}			
		}
		

		
		
		
		
		
	
	}


















?>
