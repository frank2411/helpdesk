<body>
  
  <?php $this->getHeader(); ?>
  
  <div class="container">  
    <div class="main left">
      <?php $this->getLayout($templatePath,$vars); ?>
    </div>
    <div class="sidebar">
      <?php $this->getSidebar(); ?>
    </div>
    <div class="clear"></div>
  </div>
  
  <?php echo $this->getFooter(); ?>

</body>


</html>





