<?php 
	
	class Ask extends Desk{
	
		private $_success="";
	
		function __construct()
		{
			$post = $this->getPostRequest();			
			if($post["action"] == "insert")
			{				
				$this->validateData($post);
			}
		}
	
		public function getStatus()
		{
			return $this->_success;
		}
	
		private function setStatus($status)
		{
			$this->_success = $status;
		}
		
		public function validateData($post)
		{
			$messages = "";
			
			if($post["text"] == "")
			{
				$messages .= "Il campo testo non può essere vuoto<br>";
			} 
			
			if($post["title"] == "")
			{
				$messages .= "Devi selezionare un titolo!";
			}
			
			if("" != $messages)
			{
				$this->setMessages($messages);
				$this->setStatus(false);
				return false;
			} 
			
			$this->setStatus(true);
			
		}
	

	
		
	
	
	
	}

?>
