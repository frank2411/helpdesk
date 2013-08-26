<div class="defaultWidgetGeneralContainer">
  <div class="sectionTitle">
    FAI LA TUA DOMANDA
  </div>
  <div class="defaultWidgetContainer">
    <?php
    echo $this->getMessages();
    if($this->getStatus()){
      $this->getPartial("ask-success",$vars);		
    } else {
      $this->getPartial("form/ask-form",$vars);		
    }
    ?>
  </div>
</div>
