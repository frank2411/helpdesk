<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
    <head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
      <?php if ($this->isHome()) { ?>
	<title>Home Page</title>
      <?php  } else if ($this->isCategory()) { ?>
	<title><?php echo $this->getCurrentCatName() ?></title>
      <?php  } else if ($this->isSingle()) { ?>
	<title><?php echo $this->getCurrentPostTitle() ?></title>
      <?php  } else if ($this->isLogin()) { ?>
	<title>Effettua il Login</title>
      <?php  } else if ($this->isRegister()) { ?>
	<title>Registrati a HelpDesk</title>
      <?php } else { ?>
	<title>The ultimate HelpDesk</title>
      <?php } ?>
	<link href="/style.css" rel="stylesheet" type="text/css">
	<?php $this->includeScript("jquery"); ?>
	<?php $this->includeScript("post-actions"); ?>
    </head>
  
   
 
