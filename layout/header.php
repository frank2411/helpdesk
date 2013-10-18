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
      


      <a class="navigationButton left confirm" id="confirm" href="#">
        CIAOOOOOOOOOOOOOOOOOOOO
      </a>

      <a class="navigationButton left confirm" id="ciao" href="#">
        CIAOOOOOOOOOOOOOOOOOOOO
      </a>

      <div class="clear"></div>
    </div>
    
        
  </div>
</div>
  

  <style>
    .confirmContainer {
      background: none repeat scroll 0 0 #024566;
      border: 1px solid #CCCCCC;
      color: #FFFFFF;
      font-size: 20px;
      font-weight: bold;
      left: 50%;
      margin-left: -190px;
      padding: 40px;
      position: absolute;
      top: 50%;
      width: 300px;
    }
  </style>

  <script type="text/javascript">

    var ciao = Confirm.Prepare({
      elementId: "confirm",
      buttonTrue: "Accetta",
      buttonFalse: "Annulla",
      message: "Sei sicuro di voler cancellare questo elemento ??",
      onClose: function(){
        this.sendUserChoise();
      },
      open: "click"
    });


    Confirm.Prepare({
      elementId: "ciao",
      buttonTrue: "AVOJA",
      buttonFalse: "MA ANCHE NO",
      message: "Sei sicuro di voler morire ????",
      onClose: function(){
        this.sendUserChoise();
      },
      open: "click"
    });


  </script>

    <?php 
      //$singleCatStuff = $this->getCatBySlug("non-approvati") ; 
      //echo $singleCatStuff->cat_slug;
      //print_r($singleCatStuff);
    ?>
