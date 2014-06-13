<h1>Login</h1>
<?php 
echo $this->Form->create('Pessoas');
echo $this->Form->input('username', array('label' => 'Usuário'));
echo $this->Form->input('password', array('label' => 'Senha'));
echo $this->Form->end('Login'); 
?>
<span>
	<?php echo $this->Session->flash('auth'); ?>
</span>