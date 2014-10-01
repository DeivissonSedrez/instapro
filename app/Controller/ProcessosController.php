<?php

class  ProcessosController extends AppController{

	public function index(){		
		
	}
	
	public function adicionar(){		
		// $this->set('permissoes',$this->PessoaAcesso->find('list', array(
  //       	'fields' => array('PessoaAcesso.id', 'PessoaAcesso.tipo')
  //       ))); 
		// $this->set('paises',$this->Pais->find('list'));
		// $this->set('estados',$this->Estados->find('list', array(
  //       	'fields' => array('Estados.id', 'Estados.nome')
  //       ))); 
		if($this->request->is('post')){
			// temporario enquanto falta os fields no form
			$this->request->data['Pessoas']['tipo_pessoa'] = 1;
			// -------------------------------------------
			if($this->Pessoas->PessoaContato->validates() && $this->Pessoas->PessoaFisica->validates()  && $this->Pessoas->PessoaModulo->validates()){
				ini_set('memory_limit', '-1');
				$datasource = $this->Pessoas->getDataSource();
				try{
					$datasource->begin();

					if($this->Pessoas->save($this->request->data)){
						$this->request->data['PessoaContato']['id_pessoa'] = $this->Pessoas->id;
						$this->request->data['PessoaFisica']['id_pessoa'] = $this->Pessoas->id;

						for($x=0; $x<count($this->request->data['PessoaModulo']);$x++){
							$this->request->data['PessoaModulo'][$x]['id_pessoa'] = $this->Pessoas->id;		
							
						}
						//die(print_r($this->request->data['PessoaModulo']));
					}else{
						 throw new Exception();
					}

					    if(!$this->Pessoas->PessoaContato->save($this->request->data))
					        throw new Exception();

					    if(!$this->Pessoas->PessoaFisica->save($this->request->data))
					        throw new Exception();

					    if(!$this->Pessoas->PessoaModulo->saveAll($this->request->data))
					        throw new Exception();

					    $datasource->commit();
					    $this->Session->setFlash('Contato salvo com sucesso!');
					} catch(Exception $e) {
					    $datasource->rollback();
					    $this->Session->setFlash('Erro ao salvar Contato!');
					}

				// 	$this->Pessoas->PessoaContato->save($this->request->data);
				// 	$this->Pessoas->PessoaFisica->save($this->request->data);					
				// 	$this->Pessoas->PessoaModulo->save($this->request->data);
				// 	$this->Session->setFlash('Contato salvo com sucesso!');
				// } else {
				// 	$this->Session->setFlash('Erro ao salvar Contato!');
				// }
			} else {
				$this->Session->setFlash('Erro ao salvar Contato!');
			}
		}
	}
}
?>