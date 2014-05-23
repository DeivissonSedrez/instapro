<?php
class Contact extends AppModel{
	var $name = 'Contact';
	public $useTable = false; 
	var $validate = array(
		'name'=>array(
			'rule'=>'notEmpty',
			'message'=>'O campo E-nome é obrigatório.'),
		'email'=>array(
			'rule'=>'email',
			'message'=>'O campo Email é obrigatório.'),
		'message'=>array(
			'rule'=>'notEmpty',
			'message'=>'O campo Motivo do contato é obrigatório.'
		)
	);
}
?>