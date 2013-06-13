<?php print_r($_GET); die(); ?>

<?php $post = $this->getPost(); ?>

<div class="postTitle"> 
  <?php echo $post->title; ?>
</div>

<div class="single_post <?php echo $post->id ?> postText"> 
  <?php echo $post->post; ?>
</div>

<?php if($post->status) { ?>
  <div class="status">
    <?php echo $post->status; ?>
  </div>
<?php } ?>
