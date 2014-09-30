<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class  PessoasController extends AppController{

	var $uses = array('Pais', 'Estados', 'Cidade', 'Pessoas','PessoaAcesso', 'PessoaContato', 'PessoaFisica', 'PessoaModulo');

	public function index(){		
		$allPessoas = $this->Pessoas->find('all', array('order' => array('Pessoas.nome ASC')));
		$conteudo = "";
		foreach($allPessoas as $pessoa){
			$link = Router::url("/pessoas/editar/".$pessoa['Pessoas']['id']);
            $conteudo .= "<a href='{$link}'><div class='itm' id='".$pessoa['Pessoas']['id']."'>
			<div class='itm_nome'><h3>".$pessoa['Pessoas']['nome']."</h3></div>
			<div class='info'>
				<span class='label'>Login: ".$pessoa['Pessoas']['login']."</span></br>
				<span class='label'>e-Mail: ".$pessoa['Pessoas']['tipo_pessoa']."</span></br>
				<span class='value'>Perfil: ".$pessoa['Pessoas']['tipo_acesso']."</span>
			</div>
		</div>";			
		} 
		$this->set('pessoas', $conteudo);
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
			//$this->request->data['Pessoas']['tipo_acesso'] = 1;
			// -------------------------------------------
			if($this->Pessoas->PessoaContato->validates() && $this->Pessoas->PessoaFisica->validates()){
				if($this->Pessoas->save($this->request->data)){
					$this->request->data['PessoaContato']['id_pessoa'] = $this->Pessoas->id;
					$this->request->data['PessoaFisica']['id_pessoa'] = $this->Pessoas->id;
					$this->request->data['PessoaModulo']['id_pessoa'] = $this->Pessoas->id;
					$this->Pessoas->PessoaContato->save($this->request->data);
					$this->Pessoas->PessoaFisica->save($this->request->data);					
					$this->Pessoas->PessoaModulo->save($this->request->data);
					$this->Session->setFlash('Contato salvo com sucesso!');
				} else {
					$this->Session->setFlash('Erro ao salvar Contato!');
				}
			} else {
				$this->Session->setFlash('Erro ao salvar Contato!');
			}
		}
	}

	public function editar($id){
		$this->set('permissoes',$this->PessoaAcesso->find('list', array(
        	'fields' => array('PessoaAcesso.id', 'PessoaAcesso.tipo')
        ))); 
		$this->set('paises',$this->Pais->find('list'));
		$this->set('estados',$this->Estados->find('list', array(
        	'fields' => array('Estados.id', 'Estados.nome')
        ))); 
		$this->set('pessoa', $this->Pessoas->findById($id));	
	}

	public function searchPessoa(){
		$this->autoRender = false;
		$conditions = 'Pessoas.nome LIKE "%'. $this->request->data['string'].'%"'; 
		//$conditions .= ' OR Practitioner.surname LIKE "%'.$surname.'%"'; 		
		
		$allPessoas =  $this->Pessoas->find('all', array('conditions'=> $conditions ));
		$conteudo = "";

		if(count($allPessoas) >0){
			foreach($allPessoas as $pessoa){
			$link = Router::url("/pessoas/editar/".$pessoa['Pessoas']['id']);
            $conteudo .= "<a href='{$link}'><div class='itm' id='".$pessoa['Pessoas']['id']."'>
				<div class='itm_nome'><h3>".$pessoa['Pessoas']['nome']."</h3></div>
				<div class='info'>
					<span class='label'>Login: ".$pessoa['Pessoas']['login']."</span></br>
					<span class='label'>e-Mail: ".$pessoa['Pessoas']['tipo_pessoa']."</span></br>
					<span class='value'>Perfil: ".$pessoa['Pessoas']['tipo_acesso']."</span>
				</div>
			</div>";			
			} 
		}else{
			$conteudo ="<div class='itm'>Nenhum registro correponde a esta busca.</div>";
		}
		return $conteudo;
	}
	public function searchPessoaInicial(){
		$this->autoRender = false;
		$conditions = 'Pessoas.nome LIKE "'. $this->request->data['string'].'%"'; 
		//$conditions .= ' OR Practitioner.surname LIKE "%'.$surname.'%"'; 		
		
		$allPessoas =  $this->Pessoas->find('all', array('conditions'=> $conditions ));
		$conteudo = "";

		if(count($allPessoas) >0){
			foreach($allPessoas as $pessoa){
			$link = Router::url("/pessoas/editar/".$pessoa['Pessoas']['id']);
            $conteudo .= "<a href='{$link}'><div class='itm' id='".$pessoa['Pessoas']['id']."'>
				<div class='itm_nome'><h3>".$pessoa['Pessoas']['nome']."</h3></div>
				<div class='info'>
					<span class='label'>Login: ".$pessoa['Pessoas']['login']."</span></br>
					<span class='label'>e-Mail: ".$pessoa['Pessoas']['tipo_pessoa']."</span></br>
					<span class='value'>Perfil: ".$pessoa['Pessoas']['tipo_acesso']."</span>
				</div>
			</div>";			
			} 
		}else{
			$conteudo = "<div class='itm-NFound'>
				<div class='itm_nome'><h3>Nenhum registro correponde a esta busca</h3></div>
				
			</div>";		
		}
		return $conteudo;
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
		$this->set('pessoascad', $this->Pessoas->find('all'));
		$this->layout = 'login';
	    if ($this->request->is('post')) {
/*
	        $username = $this->request->data['login-form']['username'];
	        die($this->request->data['login-form']['password']);
=======*/
	        $username = $this->request->data['username'];
	        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $password = $passwordHasher->hash($this->request->data['password']);
	        if($data = $this->Pessoas->find('first' , array('conditions' => array('Pessoas.login' => $username, 'Pessoas.password' => $password)))){
	        	//die(print_r($this->PessoaModulo->find('list', array('fields' => array('PessoaModulo.id_pessoa', 'PessoaModulo.id_modulo, PessoaModulo.visualiza, PessoaModulo.cadastra')), array('conditions'=> array('PessoaModulo.id_pessoa'=>$data['Pessoas']['id'])))));


                if($dat = $this->registerSession($data)){
                    $this->redirect('/pessoas');
                } 
                else{
                    $this->Session->setFlash(
		                __('Não foi possivel setar a sessão!'),
		                'default',
		                array(),
		                'auth'
		            );
		            $this->redirect($this->referer());
                }
	        }
	        $this->Session->setFlash(
                __('Usuário e senha incorretos!'),
                'default',
                array(),
                'auth'
            );
            $this->redirect($this->referer());
	    }
	}  

	public function registerSession($data){
$permissoes =$this->PessoaModulo->find('all', array(
    'joins' => array(
        array(
            'table' => 'modulos',
            'alias' => 'Modulo',
            'type' => 'LEFT',
            'conditions' => array(
                'Modulo.id = PessoaModulo.id_modulo'
            )
        )
    ),
    'conditions' => array(
        'PessoaModulo.id_pessoa = '. $data['Pessoas']['id']
    ),
    'fields' => array('Modulo.nome', 'PessoaModulo.*'),
    'order' => 'Modulo.id ASC'
));
        $this->Session->write('User.id', $data['Pessoas']['id']);
        $this->Session->write('User.nome', $data['Pessoas']['nome']);
        $this->Session->write('User.login', $data['Pessoas']['login']);
        $this->Session->write('User.permissions',$permissoes);
        if($this->Session->read('User')){
        	$this->Auth->login($data['Pessoas']['id']);
            return true;
        }
    }
    
    public function logout(){
        $this->autoRender = false;
        $this->Session->delete('User');
        $this->Session->destroy();
        $this->redirect(array('controller' => 'home'));
    }

    public function previewAvatar(){
    	$this->autoRender = false;
    	$image = new File($_FILES['data']['tmp_name']['Pessoas']['avatar']);
    	$cpName = rand(111111, 999999);
    	$copy = $image->copy(TMP . "tmp_avatar" . DS . "avatar".$cpName.'.png');
    	$copied = new File(TMP . "tmp_avatar" . DS . "avatar".$cpName.'.png');
    	echo json_encode(array(
	    		'status' => true,
	    		'image' => base64_encode($image->read()),
	    		'path' => $copied->path
    		)
    	);
    }
    public function atualizar(){		
		
		if($this->request->is('post')){
			// temporario enquanto falta os fields no form
			//$this->request->data['Pessoas']['tipo_acesso'] = 1;
			// -------------------------------------------
			if($this->Pessoas->PessoaContato->validates() && $this->Pessoas->PessoaFisica->validates()){
				if($this->Pessoas->updateAll($this->request->data)){
					$this->request->data['PessoaContato']['id_pessoa'] = $this->Pessoas->id;
					$this->request->data['PessoaFisica']['id_pessoa'] = $this->Pessoas->id;
					$this->request->data['PessoaModulo']['id_pessoa'] = $this->Pessoas->id;
					$this->Pessoas->PessoaContato->updateAll($this->request->data);
					$this->Pessoas->PessoaFisica->updateAll($this->request->data);					
					$this->Pessoas->PessoaModulo->updateAll($this->request->data);
					$this->Session->setFlash('Contato salvo com sucesso!');
				} else {
					$this->Session->setFlash('Erro ao salvar Contato!');
				}
			} else {
				$this->Session->setFlash('Erro ao salvar Contato!');
			}
		}
	}

}
?>