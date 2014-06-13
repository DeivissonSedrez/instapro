<h1>Login</h1>
<?php 
echo $this->Form->create('Pessoas');
echo $this->Form->input('login');
echo $this->Form->input('password');
echo $this->Form->end('Login'); 
?>
<span>
	<?php echo $this->Session->flash('auth'); ?>
</span>