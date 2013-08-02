<?php $this->getPageTitle() ?>

<div class="defaultWidgetGeneralContainer">
	<div class="sectionTitle">
    Post in <?php echo $this->getCurrentCatName(); ?>
  </div>
	<div class="defaultWidgetContainer">
  <?php
    $posts  = $this->getPosts();
    $counter = 1;
    foreach ($posts as $post){ 
			$tags = $this->getTags($post->id);
	?>
		<?php 
			/*if($this->user()->getUserId() == $post->author){
				echo "MIA";
			}*/
		?>
		<div class="post-list not_approved post_id_<?php echo $post->id?>">
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
			<?php /* 
			<a class="approveButton radius" href="/post/approve/id/<?php echo $post->id ?>/">Approva Post</a>
			<a class="deleteButton radius" href="/post/delete/id/<?php echo $post->id ?>/">Elimina Post</a>
			*/
			//$singleStuff = $this->getCatBySlug("non-approvati");
			//echo $singleStuff->id;
			//print_r($singleStuff);
			?>
		</div>
    <?php  
      $counter++;
    }
    
  ?>
	</div>
</div>









