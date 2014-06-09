<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Pessoas extends AppModel{
	var $name = 'Pessoas';
	public $useTable = 'pessoas'; 	
	public $hasOne = array(
		'PessoaContato' => array(
			'className' => 'PessoaContato',
	        'foreignKey' => 'id_pessoa'
		), 
		'PessoaFisica' => array(
			'className' => 'PessoaFisica',
	        'foreignKey' => 'id_pessoa'
		)
	);
	public $validation = array(
		'nome' => array(
			'notempty' => array(

			)
		)
	);

	public function beforeSave($options = array()){
		if (!empty($this->data['Pessoas']['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data['Pessoas']['password'] = $passwordHasher->hash(
                $this->data['Pessoas']['password']
            );
        }
        return true;
	}
}
?>