<div class="header">
  <div class="headerContent">
    <div class="headerNavigation">
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
