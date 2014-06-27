
<head>
<?php echo $this->Html->css(array('login/core.css'));?> 
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
	<div id="wrapper">
		<div id="login-body">	
			<?php echo $this->Form->create('login',array('class'=>'show'))?>
			<div id="login">
				<div id="login-user">
					<div class="icon-user"><span class="arrow">"</span></div>
						<?php echo $this->Form->input('username', array('class'=>'login-input required',  'css' => array('display'=>'inline'))); ?>
					

				<?php echo $this->Form->input('password', array('label' => array('text' => '<h4 style="display:inline">Senha: </h4>', 'class'=>'labelform'), 'class'=>'no',  'css' => array('display'=>'inline'))); ?>

				<?php echo $this->Form->end('Login', array('label'=>array('text'=>'Login', 'class'=>'submit button green'))); ?>
				<!--input class="submit button green" type="submit" value="LOGIN"/-->

<span>
	<?php echo $this->Session->flash('auth'); ?>
</span>