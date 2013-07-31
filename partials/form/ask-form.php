<form action="" method="POST">

	<input type="hidden" name="action" value="insert" />
	<div class="inputContainer">
		<p class="inputLabel">Inserisci un titolo</p>
		<input class="inputMiddle extended" type="text" name="title" value="<?php echo $_POST["title"] ?>" />
	</div>
	<div class="inputContainer">
		<p class="inputLabel">Inserisci la tua domanda</p>
		<textarea class="inputMiddle" name="text"><?php echo $_POST["text"] ?></textarea>
	</div>
	<div class="inputContainer center">
		<input class="btn" type="submit" value="invia" />
	</div>
	
</form>
