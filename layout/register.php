<div class="defaultWidgetGeneralContainer">
	<div class="sectionTitle">
		Registrati a Helpdesk!
  </div>
	<div class="defaultWidgetContainer">
		<div class="center">
			<?php echo $this->getMessages(); ?>
		</div>
		<?php
			if($this->getStatus()){
				echo "Complimenti ti sei registrato a Helpdesk!";
			} else {
				$this->getPartial("form/register-form",$vars);		
			}
		?>
	</div>
</div>
