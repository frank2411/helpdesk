<div class="defaultWidgetGeneralContainer">
  <div class="defaultWidgetContainer">
    <form action="" method="POST">
      <input type="hidden" name="author_id" value="<?php echo $this->user()->getUserId() ?>" />
      <input type="hidden" name="author_name" value="<?php echo $this->user()->getUsername() ?>" />
      <input type="hidden" name="post_parent" value="<?php echo $vars ?>" />
      <input type="hidden" name="action" value="answer" />
      <div class="inputContainer">
	<p class="inputLabel">Inserisci la tua risposta</p>
	<textarea class="inputMiddle" name="answer"></textarea>
      </div>
      <div class="inputContainer center">
	<input class="btn" type="submit" value="invia" />
      </div>
    </form>
  </div>
</div>
