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

    public $validate = array(
    	'sexo' => array(
	        'required' => array(
	            'rule' => array('notEmpty'),
	        )
	    ),
	    'cpf' => array(
	        'required' => array(
	            'rule' => array('notEmpty'),
	            'message' => 'Preencha o CPF'
	        )
	    )
    );

    public function beforeSave($options = array()){
    	$this->data['PessoaFisica']['data_nascimento'] = implode("-",array_reverse(explode("/", $this->data['PessoaFisica']['data_nascimento'])));
    	return true;
    }
}
?>