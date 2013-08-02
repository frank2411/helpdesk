<form action="" method="POST">
	<input type="hidden" name="action" value="register" />
	
	<div class="inputContainer center">
		<p class="inputLabel center">Username</p>
		<input class="inputMiddle" type="text" name="nickname" value="<?php echo $_POST["nickname"] ?>" />
	</div>
	
	<div class="inputContainer center">
		<p class="inputLabel center">Email</p>
		<input class="inputMiddle" type="text" name="email" value="<?php echo $_POST["email"] ?>" />
	</div>

	<div class="inputContainer center">
		<p class="inputLabel center">Password</p>
		<input class="inputMiddle" type="password" name="password" value="<?php echo $_POST["password"] ?>" />
	</div>
	
	<div class="inputContainer center">
		<input class="btn" type="submit" value="invia" />
	</div>
</form>
