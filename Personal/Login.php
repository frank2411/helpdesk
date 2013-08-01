<?php 
	
	class Login extends Desk {
	
		function __construct()
		{
			$post = $this->getPostRequest();			
			if($post["action"] == "login")
			{
				$this->validateData($post);
			}
		}
			
		public function validateData($post)
		{
			$messages = "";
			if($post["username"] == "") {
				$messages .= "Inserisci il nome utente!<br>";
			} 
			if($post["password"] == "") {
				$messages .= "Inserisci una password!";
			}
			if("" != $messages) {
				$this->setMessages($messages);
				$this->setStatus(false);
				return false;
			}
			
			$identity = $this->checkIdentity(mysql_real_escape_string($post["username"]),mysql_real_escape_string($post["password"]));			
			
			if(!$identity){
				$messages = "Nome utente e/o password errati";
				$this->setMessages($messages);
				$this->setStatus(false);
				return false;			
			} else {
				$this->user()->setIdentity($identity->id,$post["username"],$identity->role);
			}
			
			$this->setStatus(true);
			
		}
	
		private function checkIdentity($username,$password)
		{
			$query = "
				SELECT id,role
				FROM users
				WHERE nickname = '".$username."' AND password = '".$password."'
			";
			$row = $this->fetchRow($query);			
			if(empty($row)){
				return false;
			} else {
				return $row;
			}
		}
	
	
	}

?>

