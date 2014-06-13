<?php

class  PessoasController extends AppController{

	var $uses = array('Pais', 'Estados', 'Cidade', 'Pessoas','PessoaAcesso', 'PessoaContato', 'PessoaFisica');

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
			// -------------------------------------------
			if($this->Pessoas->save($this->request->data)){
				$this->request->data['PessoaContato']['id_pessoa'] = $this->Pessoas->id;
				$this->request->data['PessoaFisica']['id_pessoa'] = $this->Pessoas->id;
				$this->Pessoas->PessoaContato->save($this->request->data);
				$this->Pessoas->PessoaFisica->save($this->request->data);
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
	    if ($this->request->is('post')) {
	    	//die(var_dump($this->request->data));
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
 	        } else {
	            $this->Session->setFlash(
	                __('Username or password is incorrect!'),
	                'default',
	                array(),
	                'auth'
	            );
	        }
	    }
	}
}
?>