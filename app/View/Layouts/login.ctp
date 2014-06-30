<!doctype html>
<html lang="en">

<!-- Mirrored from amxui.novalx.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 26 Jun 2014 22:25:50 GMT -->
<head>
	<meta charset="UTF-8">
	<title>Instapro - Login</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
	<link rel="shortcut icon" href="favicon.png">
	<?php echo $this->Html->css(array('login/core.css'));?> 
	<?php echo $this->Html->css(array('login/icons.css'));?>
	<?php echo $this->Html->css(array('login/login.css'));?>
	<?php echo $this->Html->css(array('login/inputs.css'));?>
	<?php echo $this->Html->css(array('login/ui.css'));?>
	<?php echo $this->Html->css(array('login/anims.css'));?>
	<?php echo $this->Html->css(array('login/global.css'));?>
	<?php echo $this->Html->script(array("login/jquery.js"));?>
	<?php echo $this->Html->script(array("login/inputs.js"));?>
	<?php echo $this->Html->script(array("login/functions.js"));?>
</head>
<body>
	<?php echo $this->Form->input('base', array('id' => 'base', 'value' => $this->base, 'type' => 'hidden')) ?>	
	<div id="content">
		<?php echo $content_for_layout; ?>
	</div>			
</body>
</html>
