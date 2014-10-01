<?php
class PessoaModulo extends AppModel{
	var $name = 'PessoaModulo';	
	public $useTable = 'pessoa_modulo';
	public $belongsTo = array(
		'Pessoas' => array(
	        'className' => 'Pessoas',
	        'foreignKey' => 'id_pessoa'
	    )
    );
}
?>