<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class  Senhas extends AppController{

	var $uses = array('Pessoas');

	public function AlteraSenha($idPessoa){		
		
		if($this->request->is('post')){
				$sql="update pessoas
				set 
				password='".$this->request->data['Senha']['password']."'  where id=".$idPessoa;				
				$this->PessoaFisica->query($sql);				
		}
	}
}
?>