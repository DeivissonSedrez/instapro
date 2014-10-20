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
			$tooltip = "<table><tr><td>Perfil:".$pessoa['PessoaAcesso']['tipo']."</td></tr><tr><td>e-Mail:".$pessoa['PessoaContato']['email']."</td></tr><tr><td> Telefone :".$pessoa['PessoaContato']['telefone_1']."</td></tr></table>";
			$link = Router::url("/pessoas/visualizar/".$pessoa['Pessoas']['id']);
			$conteudo .= "<a href='{$link}'><div class='itm' id='".$pessoa['Pessoas']['id']."' title='".$tooltip."' >
			<div class='itm_nome'><h3>".$pessoa['Pessoas']['nome']."</h3></div>
			<div class='info'>
				<span class='label'>Login: ".$pessoa['Pessoas']['login']."</span></br>
				<span class='label'>e-Mail: ".$pessoa['PessoaContato']['email']."</span></br>
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
		$this->request->data['Pessoas']['tipo_pessoa'] = 1;
			// -------------------------------------------
		if($this->Pessoas->PessoaContato->validates() && $this->Pessoas->PessoaFisica->validates()  && $this->PessoaModulo->validates()){
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

				if(!$this->PessoaModulo->saveAll($this->request->data['PessoaModulo']))
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

public function visualizar($id){
	$this->set('permissoes',$this->PessoaAcesso->find('list', array(
		'fields' => array('PessoaAcesso.id', 'PessoaAcesso.tipo')
		))); 

	$this->set('paises',$this->Pais->find('list'));
	$this->set('estados',$this->Estados->find('list', array(
		'fields' => array('Estados.id', 'Estados.nome')
		))); 
	$this->set('Pessoas', $this->Pessoas->findById($id));	
	$this->set('PessoaModulo', $this->PessoaModulo->find('all',array('conditions'=>array('PessoaModulo.id_pessoa'=>$id))));


	//$this->add('Pessoas', $this->PessoaModulo->find('all',array('conditions'=>array('PessoaModulo.id_pessoa'=>$id))));
     //$this->set('Pessoas', $this->Pessoas->find('all',array('conditions'=>array('Pessoas.id'=>$id))));
	
}
public function editar($id){
	if($this->request->is('post')){

		/*print "<pre>";
		print_r($this->request->data);
		print "</pre>";*/
		//die();
		$datasource = $this->Pessoas->getDataSource();
		try{
			$datasource->begin();

			echo "1";
			$sql ="update pessoas
			set 
			nome='".$this->request->data['Pessoas']['nome']."', 
			tipo_Acesso='".$this->request->data['Pessoas']['tipo_acesso']."' where id=".$this->request->data['Pessoas']['id'];
			if($this->Pessoas->query($sql))
			{

			    //$this->Pessoas->query($this->request->data)){
				echo "2";
				//$this->request->data['PessoaContato']['id_pessoa'] = $this->request->data['Pessoas']['id'];
				//$this->request->data['PessoaFisica']['id_pessoa'] = $this->request->data['Pessoas']['id'];

				/*for($x=0; $x<count($this->request->data['PessoaModulo']);$x++){
					$this->request->data['PessoaModulo'][$x]['id_pessoa'] = $this->request->data['Pessoas']['id'];		
				}*/
				//die(print_r($this->request->data['PessoaModulo']));
			}else{
				echo "3";
				echo $sql;
				throw new Exception();
			}
			echo "4";
		//if(!$this->Pessoas->PessoaContato->update($this->request->data)){
			$cep = $this->request->data['PessoaContato']['cep'];
			$cep =  ( $cep != null) ? $this->removeChar($cep) : ""; 
			$tel1 = $this->request->data['PessoaContato']['telefone_1'];
			$tel1 = ($tel1  != null) ? $this->removeChar($tel1) : "";
			$tel2 = $this->request->data['PessoaContato']['telefone_2'];
			$tel2 = ($tel2  != null) ? $this->removeChar($tel2) : "";
			$tel3 = $this->request->data['PessoaContato']['telefone_3'];
			$tel3 = ($tel3  != null) ? $this->removeChar($tel3) : "";

			$sql="update pessoa_contato
			set 
			endereco='".$this->request->data['PessoaContato']['endereco']."', 
			complemento='".$this->request->data['PessoaContato']['complemento']."', 
			bairro='".$this->request->data['PessoaContato']['bairro']."', 
			id_pais='".$this->request->data['PessoaContato']['id_pais']."', 
			id_estado='".$this->request->data['PessoaContato']['id_estado']."', 
			id_cidade='".$this->request->data['PessoaContato']['id_cidade']."', 
			cep='".$cep."', 
			email='".$this->request->data['PessoaContato']['email']."', 
			telefone_1='".$tel1."', 
			tipo_tel_1='".$this->request->data['PessoaContato']['tipo_tel_1']."', 
			telefone_2='".$tel2."', 
			tipo_tel_2='".$this->request->data['PessoaContato']['tipo_tel_2']."', 
			telefone_3='".$tel3."', 
			tipo_tel_3='".$this->request->data['PessoaContato']['tipo_tel_3']."'  where id_pessoa=".$this->request->data['Pessoas']['id'];
			if(!$this->PessoaContato->query($sql))
			{
				echo "5";
				echo $sql;
				throw new Exception();
			}
			echo "6";
            //if(!$this->Pessoas->PessoaFisica->update($this->request->data)){
			$cpf = $this->request->data['PessoaFisica']['cpf'];
			$cpf =  ( $cpf != null) ? $this->removeChar($cpf) : null; 
			$rg = $this->request->data['PessoaFisica']['rg'];
			$rg =  ( $rg != null) ? $this->removeChar($rg) : null; 
		   // $titulo = $this->request->data['PessoaFisica']['titulo_eleitor'];
		    //$titulo =  ( $titulo != null) ? $this->removeChar($titulo) : null; 
			$sql="update pessoa_fisica
			set 
			sexo='".$this->request->data['PessoaFisica']['sexo']."', 
			ctps_num='".$this->removeChar($this->request->data['PessoaFisica']['ctps_num'])."', 
			ctps_serie='".$this->removeChar($this->request->data['PessoaFisica']['ctps_serie'])."', 
			oab='".$this->request->data['PessoaFisica']['oab']."', 
			tratamento='".$this->request->data['PessoaFisica']['tratamento']."', 
			estado_civil='".$this->request->data['PessoaFisica']['estado_civil']."',     	
			data_nascimento='".implode("-",array_reverse(explode("/", $this->request->data['PessoaFisica']['data_nascimento'])))."', 
			nacionalidade='".$this->request->data['PessoaFisica']['nacionalidade']."', 
			rg='".$rg."', 
			cpf='".$cpf."', 
			profissao='".$this->request->data['PessoaFisica']['profissao']."' where id_pessoa=".$this->request->data['Pessoas']['id'];
			if(!$this->PessoaFisica->query($sql))
			{
				echo "7";
				echo $sql;
				throw new Exception();
			}
            echo "8";
			foreach($this->request->data['PessoaModulo'] as $modulo){
			     //if(!$this->PessoaModulo->update($modulo)){
				if(!$this->PessoaModulo->query("update pessoa_modulo set visualiza=".$modulo['visualiza'].", cadastra=".$modulo['cadastra']." where id_pessoa_modulo=".$modulo['id_pessoa_modulo']))
				{
					echo "9";
					throw new Exception();
				}
			}
			$datasource->commit();
			echo "10";
			$this->Session->setFlash('Contato atualizado com sucesso!');
		} catch(Exception $e) {
			echo "11";
		    //print "<pre>";
			//print($e);
		    //print "</pre>";
        	//echo $e;
			$datasource->rollback();
			$this->Session->setFlash('Erro ao atualizar Contato!');
		}
	} 
	else 
	{
		$this->Session->setFlash('Erro ao começar atualização de Contato!');
	}
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
	private function removeChar($string){
		$string=str_replace("(", "", trim($string));
			$string=str_replace(")", "", $string);
			$string=str_replace("-", "", $string);
			$string=str_replace(".", "", $string);            
			$string=str_replace("/", "", $string);            
			$string=str_replace(" ", "", $string);
			return $string;
		}

	}
	?>