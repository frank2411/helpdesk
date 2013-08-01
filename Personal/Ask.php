<?php 
	
	class Ask extends Desk {
	
		private $_success="";
	
		function __construct()
		{
			$post = $this->getPostRequest();			
			if($post["action"] == "insert")
			{				
				$this->validateData($post);
			}
		}

		public function validateData($post)
		{
			$messages = "";
						
			if($post["text"] == "") {
				$messages .= "Il campo testo non può essere vuoto<br>";
			} 
			
			if($post["title"] == "") {
				$messages .= "Devi selezionare un titolo!";
			}
						
			if("" != $messages) {
				$this->setMessages($messages);
				$this->setStatus(false);
				return false;
			} 
			
			$title = mysql_real_escape_string($post["title"]);
			$content = mysql_real_escape_string($post["text"]);
			$url = $this->parsePermalink(mysql_real_escape_string($post["title"]));
			$author = mysql_real_escape_string($post["author_id"]);
			$this->insertNewPost($title,$content,$url,$author);
			$category = $this->insertPostInCategory($url,mysql_real_escape_string($post["categories"]));			
			$this->setStatus(true);
			
		}
	
		public function insertNewPost($title,$content,$url,$author){
			$query="
				INSERT INTO posts (title,content,url,status,author)
				VALUES ('".$title."','".$content."','".$url."','waiting','".$author."')
			";
			$this->insert($query);
		}
	
		
	
	
	
	}

?>
