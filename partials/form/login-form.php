<form action="" method="POST">
  <input type="hidden" name="action" value="login" />
  <div class="inputContainer center">
    <p class="inputLabel center">Username</p>
    <input class="inputMiddle" type="text" name="username" value="<?php echo $_POST["username"] ?>" />
  </div>
  <div class="inputContainer center">
    <p class="inputLabel center">Password</p>
    <input class="inputMiddle" type="password" name="password" />
  </div>
  <div class="inputContainer center">
    <input class="btn" type="submit" value="invia" />
  </div>
</form>
