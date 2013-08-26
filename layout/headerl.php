<div class="header">
  <div class="headerContent">
    <div class="headerNavigation">
      <?php $user = $this->user(); ?>
      <?php if($user->isLogged()){ ?>				
      <a class="navigationButton right" href="/profile/<?php echo $user->getUsername() ?>">
	IL MIO PROFILO
      </a>
      <?php } ?>
      <a class="navigationButton left" href="/">
	Home page
      </a>
      <?php 
      $catList = $this->getCatList();
      foreach($catList as $category){
      ?>
	<a class="navigationButton left" href="/category/<?php echo $category->url ?>/">
	  <?php echo $category->name;?>
	</a>
      <?php 
      }
      ?>
      <div class="clear"></div>
    </div>
  </div>
</div>

    <?php 
      //$singleCatStuff = $this->getCatBySlug("non-approvati") ; 
      //echo $singleCatStuff->cat_slug;
      //print_r($singleCatStuff);
    ?>
