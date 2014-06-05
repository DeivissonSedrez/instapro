<?php
class PessoaContato extends AppModel{
	var $name = 'PessoaContato';	
	public $useTable = 'pessoa_contato';
	public $belongsTo = array(
		'Pessoas' => array(
	        'className' => 'Pessoas',
	        'foreignKey' => 'id_pessoa'
	    )
    );
}
?>