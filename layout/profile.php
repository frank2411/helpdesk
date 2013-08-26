<?php //$this->getPageTitle() ?>

<div class="defaultWidgetGeneralContainer">
  <div class="sectionTitle">
    I miei post
  </div>
  <div class="defaultWidgetContainer">
  <?php
    $posts  = $this->getMyPost();
    foreach ($posts as $post){ 
      $tags = $this->getTags($post->id);
    ?>
    <?php 
      /*if($this->user()->getUserId() == $post->author){
	echo "MIA";
      }*/
    ?>
    <div class="post-list post_id_<?php echo $post->id?>">
      <div class="postTitle">
	<a href="/post/<?php echo $post->url ?>/">
	  <?php echo $post->title; ?>
	</a>
      </div>
      <div class="postText">
	<?php echo $post->content; ?>
      </div>
      <div class="post-author">
	<?php echo $post->postAuthor; ?>				
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
      <?php echo $post->status; ?>
    </div>
    <?php  
    }
    
  ?>
  </div>
</div>









