<div class="notApprovedList radius">
  <?php
    $toApprove  = $this->getNotApproved();
  ?>
  <div class="sectionTitle">
    Lista non approvati
  </div>

  <?php
    $counter = 1;
    foreach ($toApprove as $post){ ?>
      <div class="post not_approved post_id_<?php echo $post->id?>">
				<div class="postTitle">
					<a href="/post/<?php echo $post->url ?>/">
						<?php echo "<span class=\"counter\" >".$counter." .</span> ".$post->title; ?>
					</a>
				</div>
				<div class="postText">
					<?php echo $post->post; ?>
				</div>
				<?php /* 
				<a class="approveButton radius" href="/post/approve/id/<?php echo $post->id ?>/">Approva Post</a>
				<a class="deleteButton radius" href="/post/delete/id/<?php echo $post->id ?>/">Elimina Post</a>
				*/
				?>
				<span class="approveButton radius <?php echo $post->id ?>">Approva Post</span>
				<span class="deleteButton radius <?php echo $post->id ?>">Elimina Post</span>
      </div>
    <?php  
		$counter++;
    }
    
    //$singleStuff = $this->getCatBySlug("non-approvati");
    //echo $singleStuff->id;
    //print_r($singleStuff);
    
  ?>
</div>
