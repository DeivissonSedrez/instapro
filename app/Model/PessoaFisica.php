<?php
class PessoaFisica extends AppModel{
	var $name = 'PessoaFisica';	
	public $useTable = 'pessoa_fisica';
	public $belongsTo = array(
		'Pessoas' => array(
	        'className' => 'Pessoas',
	        'foreignKey' => 'id_pessoa'
	    )
    );
}
?>