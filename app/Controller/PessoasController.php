<?php

class  PessoasController extends AppController{

	var $uses = array('Pais', 'Estados', 'Cidade', 'Pessoas','PessoaAcesso');

	public function index(){		
		$this->set('pessoas', $this->Pessoas->find('all'));
	}
	
	public function adicionar(){		
		$this->set('permissoes',$this->PessoaAcesso->find('list', array(
        	'fields' => array('PessoaAcesso.id', 'PessoaAcesso.tipo')
        ))); 
		$this->set('paises',$this->Pais->find('list'));
		$this->set('estados',$this->Estados->find('list', array(
        	'fields' => array('Estados.id', 'Estados.nome')
        ))); 
		if($this->request->is('post')){
			// temporario enquanto falta os fields no form
			$this->request->data['Pessoas']['tipo_acesso'] = 1;
			$this->request->data['Pessoas']['tipo_pessoa'] = 1;
			// -------------------------------------------
			if($this->Pessoas->save($this->request->data)){
				$this->Session->setFlash('Pessoa salva com sucesso!');
			} else {
				$this->Session->setFlash('Erro ao salvar pessoa!');
			}
		}
	}

	public function getCities(){
		$this->autoRender = false;
		$findCities = $this->Cidade->find('list', array(
			'conditions' => array(
				'Cidade.estado' => $this->request->data['state']
			),
			'fields' => array(
				'Cidade.id', 'Cidade.nome'
			)
		));
		echo $this->prepareSelect($findCities);
	}

	public function prepareSelect($data){
		$cities = "";
		foreach($data as $key => $city){
			$cities .= "<option value='$key'>".$city."</option>";
		}
		return $cities;
	}

	public function login() {
    //if already logged in
    if ($this->Session->check('Auth.pessoa')) {
        $this->redirect(array('action' => 'index'));
    }

    $pessoa = $this->Pessoas->findById(2);

    debug($pessoa);

    if ($this->request->is('post')) {

        debug($this->request->data['Pessoa']['password']);

        debug($this->request->data);

        debug(AuthComponent::password($this->request->data['Pessoa']['password']));

        debug($pessoa['Pessoa']['password']);

        if ($pessoa['Pessoa']['password'] == AuthComponent::password($this->request->data['Pessoa']['password'])) {
            echo 'pessoa pw == hashed request data pw <br />';
        }

        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Session->setFlash(__('Login Inválido.'));
        }
    }
}
}
?>