<?php
class contactsController extends Controller{
	var $components = array('Email');
	public function send(){
		if(!empty($thisdata)){
			$this->Contact->set($this->data);
			if($this->Contact->validates()){
				if(!empty($this->data['Contact']['company'])){
					$this->Email->from = $this->data['Contact']['company'].'-'.$this->data['Contact']['name'].'<'.$this->data['Contact']['email'].'>';
				}else{
					$this->Email->from = $this->data['Contact']['name'].'<'.$this->data['Contact']['email'].'>';
				}
				$this->Email->to = 'deivisson.sedrez@gmail.com';
				$this->Email->subject = 'Teste do cake';
				$this->Email->send($this->data['Contact']['message']);
				$this->render('sucess');
			}else{
				$this->render('index');
			}
		}
	}
	public function index(){
		
	}
}
?>