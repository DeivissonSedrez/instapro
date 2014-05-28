

<div class="notice-one"><?php echo $name; ?><span></span></div>
<div class="notice-three">
	<strong><?php echo __d('cake', 'Erro'); ?>: </strong>
	<?php printf(
		__d('cake', 'O caminho %s não foi encontrado.'),
		"<strong>'{$url}'</strong>"
	); ?><span></span>
	</div>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>