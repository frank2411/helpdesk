<?php 
  $post = $this->getPost(); 
  $tags = $this->getTags($post->id);
  $answers = $this->getAnswers($post->id);
?>

<div class="defaultWidgetGeneralContainer">
  <div class="sectionTitle">
    <?php echo $post->title; ?>
  </div>
  <div class="defaultWidgetContainer">
    <div class="single_post <?php echo $post->id ?> postText"> 
      <?php echo $post->content; ?>
    </div>
		
    <div class="postTags">
      <?php
	if($tags) {
	  echo "<b>Tags</b>:";
	  foreach ($tags AS $tag){
	    echo '<a href="/tags/'.$tag->url.'">'.$tag->name.'</a>';
	  }
	}
      ?>
    </div>
				
    <?php if($post->status) { ?>
      <div class="status">
	<?php echo $post->status; ?>
      </div>
    <?php } ?>

  </div>
</div>

<div class="center">
  <?php echo $this->getMessages(); ?>
</div>

<?php 
  
  if($this->user()->isLogged()) {
    $this->getPartial("form/answer-form",$post->id); 
  }
  $this->getPartial("answers-list",$answers); 

?>





