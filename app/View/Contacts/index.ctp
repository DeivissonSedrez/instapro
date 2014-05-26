<p>Utilize o formulário abaixo para entrar em contato.</p>
<?php echo $this->Form->create('Contact',array('action'=>'send'));?>
<table style="border:none;">
	<tr>
		<td>Nome</td>
		<td><?php echo $this->Form->input('Contact.name',array('label'=>false, 'maxlength'=> 100, 'size'=>50));?></td>
	</tr>
	<tr>
		<td>Empresa</td>
		<td><?php echo $this->Form->input('Contact.company', array('label'=>false, 'maxlength'=>100, 'size'=>50));?></td>
	</tr>
	<tr>
		<td>e-Mail</td>
		<td><?php echo $this->Form->input('Contact.email', array('label'=>false, 'maxlength'=>100, 'size'=>50));?></td>
	</tr>
	<tr>
		<td style="vertical-align:top;">Motivo do contato</td>
		<td><?php echo $this->Form->input('Contact.message', array('label'=>false, 'rows'=>10, 'cols'=>50));?></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><br/>
		<?php echo $this->Form->end('Enviar e-Mail');?>
		</td>
	</tr>