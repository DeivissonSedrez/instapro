<?php

class  PessoasController extends AppController{

	var $uses = array('Pais', 'Estados', 'Cidade', 'Pessoas');

	public function index(){		
		$this->set('pessoas', $this->Pessoas->find('all'));
	}
	
	public function adicionar(){
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
}
?>