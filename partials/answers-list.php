<div class="defaultWidgetGeneralContainer">
  <div class="sectionTitle">
    Lista risposte
  </div>
  
  <div class="defaultWidgetContainer">
    <?php
    foreach($vars AS $var){
    ?>
    <div class="post-list not_approved post_id_<?php echo $var->id?>">
      <div class="postContent">
	<?php echo $var->answer; ?>
      </div>
      <div class="author">
	<?php echo $var->author_name; ?>
      </div>
    </div>
    <?php } ?>
  </div>


</div>
