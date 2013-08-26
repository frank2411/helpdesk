<?php
  
  class Post extends Desk{
  
    function __construct()
    {
      $post = $this->getPostRequest();
      if($post["action"] == "answer"){
	$this->validateData($post);
      }
      
    }
    
    public function validateData($post)
    {
      $messages = "";
      if($post["answer"] == "") {
	$messages .= "Non puoi inviare una risposta vuota";
      } 
      
      if("" != $messages) {
	$this->setMessages($messages);
	$this->setStatus(false);
	return false;
      }
      
      $postParent = mysql_real_escape_string($post["post_parent"]);
      $authorId = mysql_real_escape_string($post["author_id"]);
      $authorName = mysql_real_escape_string($post["author_name"]);
      $answer = mysql_real_escape_string($post["answer"]);
      
      $this->insertAnswer($postParent,$answer,$authorName,$authorId);
      $this->setMessages("Risposta inserita correttamente");
      $this->setStatus(true);
    }

    private function insertAnswer($postParent,$answer,$authorName,$authorId){
      $query = "
	INSERT INTO answers (post_parent_id,answer,author_name,author_id)
	VALUES ('".$postParent."', '".$answer."', '".$authorName."', '".$authorId."')";
      $this->insert($query);
    }
  
    public function getAnswers($postId){
      $query = "
	SELECT * 
	FROM answers
	WHERE post_parent_id = '".$postId."'
	ORDER BY id DESC
      ";
      $answers = $this->query($query);
      return $answers;
    }
  
  
  
  
  }



?>
