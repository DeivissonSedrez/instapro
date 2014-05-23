<?php

class  PessoasController extends AppController{
	public function index(){		
		$this->set('estados',$this->Estados->findAll()); 
    	$this->set('estadoslist', $this->Estados->generateList(  
               null, "nome ASC", null, "{n}.estados.id",  
                "{n}.estados.nome") 
                ); 
	}
	public function adicionar(){
		
	}
	public function listEstados(){

	}
	public function salvarPessoa(){
		
	}
}
?>