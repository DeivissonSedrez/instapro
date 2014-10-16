<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Pessoas extends AppModel{
	var $name = 'Pessoas';
	public $useTable = 'pessoas'; 	
	public $belongsTo = array(
		'PessoaAcesso' => array(
	        'className' => 'PessoaAcesso',
	        'foreignKey'=> 'tipo_acesso'
	    )
    );
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
	public $validate = array(
		'nome' => array(
	        'required' => array(
	            'rule' => array('notEmpty'),
	            'message' => 'Preencha o nome'
	        )
	    ),
	    'login' => array(
	        'required' => array(
	            'rule' => array('notEmpty'),
	            'message' => 'Preencha o login'
	        )
	    ),
	    'password' => array(
	        'identicalFieldValues' => array(
		        'rule' => array('identicalFieldValues', 'password2' ),
		        'message' => 'Suas senhas não conferem, por favor verifique!'
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

	public function afterSave($created, $options = array()){
		if($this->data['Pessoas']['avatarPath'] !== 0){
			if($this->handleAvatar($this->data['Pessoas']['avatarPath'], WWW_ROOT. "uploads". DS . "avatars/".$this->data['Pessoas']['id'].".jpg")){
				
			}
			return false;
		}
		return true;
	}

	public function handleAvatar($path, $destination){
		$tmp = new File($path);
		if($tmp->copy($destination)){
			$tmp->delete();
			$tmp->close();
			return true;
		}
	}

	function identicalFieldValues( $field=array(), $compare_field=null ) 
    {
        foreach( $field as $key => $value ){
            $v1 = $value;
            $v2 = $this->data[$this->name][ $compare_field ];                 
            if($v1 !== $v2) {
                return FALSE;
            } else {
                continue;
            }
        }
        return TRUE;
    } 
}
?>