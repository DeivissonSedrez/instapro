<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

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
			if($this->Pessoas->PessoaContato->validates() && $this->Pessoas->PessoaFisica->validates()){
				if($this->Pessoas->save($this->request->data)){
					$this->request->data['PessoaContato']['id_pessoa'] = $this->Pessoas->id;
					$this->request->data['PessoaFisica']['id_pessoa'] = $this->Pessoas->id;
					$this->Pessoas->PessoaContato->save($this->request->data);
					$this->Pessoas->PessoaFisica->save($this->request->data);
					$this->Session->setFlash('Pessoa salva com sucesso!');
				} else {
					$this->Session->setFlash('Erro ao salvar pessoa!');
				}
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
        $this->Session->write('User.id', $data['Pessoas']['id']);
        $this->Session->write('User.nome', $data['Pessoas']['nome']);
        $this->Session->write('User.login', $data['Pessoas']['login']);
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
}
?>