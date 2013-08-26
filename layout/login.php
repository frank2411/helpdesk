<div class="defaultWidgetGeneralContainer">
  <div class="sectionTitle">
    EFFETTUA IL LOGIN
  </div>
  <div class="defaultWidgetContainer">
    <div class="center">
      <?php echo $this->getMessages(); ?>
    </div>
    <?php
      if($this->getStatus()){
	echo "Login effettuato con successo !";
      } else {
	$this->getPartial("form/login-form",$vars);		
      }
    ?>
  </div>
</div>
