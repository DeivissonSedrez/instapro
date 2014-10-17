<?php
class PessoaContato extends AppModel{
	var $name = 'PessoaContato';	
	public $useTable = 'pessoa_contato';
	public $belongsTo = array(
		'Pessoas' => array(
           'className' => 'Pessoas',
           'foreignKey' => 'id_pessoa'
           )
        );
 public function beforeSave($options = array()){
   
   if(!empty($this->data['PessoaContato']['telefone_1'])){
    $tel=str_replace("(", "", trim($this->data['PessoaContato']['telefone_1']));
        $tel=str_replace(")", "", $tel);
        $tel=str_replace("-", "", $tel);
        $tel=str_replace(" ", "", $tel);
        $this->data['PessoaContato']['telefone_1']=$tel;
    }
    if(!empty($this->data['PessoaContato']['telefone_2'])){
        $tel=str_replace("(", "", trim($this->data['PessoaContato']['telefone_2']));
            $tel=str_replace(")", "", $tel);
            $tel=str_replace("-", "", $tel);
            $tel=str_replace(" ", "", $tel);


            $this->data['PessoaContato']['telefone_2']=$tel;
        }
        if(!empty($this->data['PessoaContato']['telefone_3'])){
            $tel=str_replace("(", "", trim($this->data['PessoaContato']['telefone_3']));
                $tel=str_replace(")", "", $tel);
                $tel=str_replace("-", "", $tel);
                $tel=str_replace(" ", "", $tel);
                $this->data['PessoaContato']['telefone_3']=$tel;
            }
            if(!empty($this->data['PessoaContato']['cep'])){
                $tel=str_replace("(", "", trim($this->data['PessoaContato']['cep']));
                    $tel=str_replace(")", "", $tel);
                    $tel=str_replace("-", "", $tel);
                    $tel=str_replace(" ", "", $tel);
                    $this->data['PessoaContato']['cep']=$tel;
                }
                return true;
            }
            
        }
        ?>