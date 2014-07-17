<?php


//echo $this->Html->script(array('jquery.maskedinput.js'));
echo $this->Html->script("scripts");
echo $this->Html->script("avatar");
?>
<div id="breadcrumbbox">
	<ul class="breadcrumb">
		<li class="home"><a href="/instapro/"></a></li>		
		<li class=""><a href="/instapro/pessoas">Pessoas</a></li>
		<li class="last"><a href="/instapro/pessoas/adicionar">Adicionar</a></li>
	</ul>
</div>

<div class="panelcmd" style="display:in-line">
<?php $sizes = array('s' => 'Small', 'm' => 'Medium', 'l' => 'Large'); ?>
	<?php echo $this->Form->create('busca')?>
	<?php echo $this->Html->link('Novo Usuário', array('controller'=> 'pessoas', 'action' => 'adicionar'), array('class' => 'button-blue'));?>
	<div style="position:relative; float:right;">
	<?php echo $this->Form->input('valor', array('label'=>false, 'type' => 'text', 'class'=>'small', 'maxlength'=>100, 'div'=>false, 'css'=> array('height'=>30) ));?>
	<a href="#" class='button-grey arrow'>Buscar<span></span></a>
	</div>
	<?php echo $this->Form->end();?>
</div>

<h2 style="margin-left: 40%;"><?php echo $this->Session->flash(); ?></h2>

<div  class="frame-big pad10">
<h1>Dados de Login</h1>
<div class="hr"></div>
<?php 
echo $this->Form->create('Pessoas');
echo $this->Form->input('tipo_pessoa', array('label'=> array('text' => '<h4 style="display:inline">Tipo Usuário: </h4>', 'enctype' => 'multipart/form-data', 'value'=> 3, 'class'=>'labelform'), 'class'=>'dropdown', 'type'=>'select', 'options' => $permissoes, 'css' => array('display'=>'inline'))); 
echo $this->Form->input('login', array('label'=> array('text' => '<h4 style="display:inline">Login: </h4>', 'class'=>'labelform'), 'class'=>'small',  'css' => array('display'=>'inline')));
echo $this->Form->input('password', array('label'=> array('text' => '<h4 style="display:inline">Senha: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'password','css' => array('display'=>'inline')));
echo $this->Form->input('password2', array('label'=> array('text' => '<h4 style="display:inline">Confirme a senha: </h4>', 'class'=>'labelform'), 'class'=>'small','type'=>'password', 'css' => array('display'=>'inline')));
echo $this->Form->input('Vprocessos', array('label'=> array('text' => '<h4 style="display:inline">Visualiza Processos: </h4>', 'value'=> 1, 'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('S' => 'Sim', 'N' => 'Não'), 'css' => array('display'=>'inline')));
echo $this->Form->input('Cprocessos', array('label'=> array('text' => '<h4 style="display:inline">Cadastra Processos: </h4>', 'value'=> 1, 'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('S' => 'Sim', 'N' => 'Não'), 'css' => array('display'=>'inline')));
echo $this->Form->input('Vpessoas', array('label'=> array('text' => '<h4 style="display:inline">Visualiza Pessoas: </h4>', 'value'=> 2, 'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('S' => 'Sim', 'N' => 'Não'), 'css' => array('display'=>'inline')));
echo $this->Form->input('Cpessoas', array('label'=> array('text' => '<h4 style="display:inline">Cadastra Pessoas: </h4>', 'value'=> 2, 'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('S' => 'Sim', 'N' => 'Não'), 'css' => array('display'=>'inline')));
?>
<div class="hr"></div>
<h1>Dados Pessoais</h1>
<div class="hr"></div>
<?php 
echo $this->Form->input('nome', array('label'=> array('text' => '<h4 style="display:inline">Nome: </h4>', 'class'=>'labelform'), 'class'=>'normal', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.tratamento', array('label'=> array('text' => '<h4 style="display:inline">Tratamento: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.estado_civil', array('label'=> array('text' => '<h4 style="display:inline">Estado Civil: </h4>', 'class'=>'labelform'), 'class'=>'dropdown', 'type'=>'select', 'options' => array('S' => 'Solteiro', 'C' => 'Casado', 'D' => 'Divorciado', 'V' => 'Viuvo'), 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.sexo', array('label'=> array('text' => '<h4 style="display:inline">Sexo: </h4>', 'class'=>'labelform'), 'class'=>'dropdown', 'type'=>'select', 'options' => array('M' => "Masculino", 'F' => 'Feminino'),'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.ctps_num', array('label'=> array('text' => '<h4 style="display:inline">CTPS Número: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.ctps_serie', array('label'=> array('text' => '<h4 style="display:inline">CTPS Série: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.oab', array('label'=> array('text' => '<h4 style="display:inline">OAB: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));

echo $this->Form->input('PessoaFisica.data_nascimento', array('label'=> array('text' => '<h4 style="display:inline">Data de Nascimento: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.nacionalidade', array('label'=> array('text' => '<h4 style="display:inline">Nacionalidade: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.rg', array('label'=> array('text' => '<h4 style="display:inline">RG: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.cpf', array('label'=> array('text' => '<h4 style="display:inline">CPF: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.profissao', array('label'=> array('text' => '<h4 style="display:inline">Profissão/Ocupação: </h4>', 'class'=>'labelform'), 'class'=>'dropdown', 'type'=>'select', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaFisica.matricula_codigo', array('label'=> array('text' => '<h4 style="display:inline">Matrícula/Código: </h4>', 'class'=>'labelform'), 'class'=>'dropdown', 'type'=>'select', 'css' => array('display'=>'inline')));
echo $this->Form->input('avatar', array( 'label' => array('text' => '', 'value'=> 2, 'class'=>'labelform'), 'style' => 'box-shadow: none; border: none; display:none;', 'class' => 'file', 'between' => '<br />','type' => 'file'));
echo $this->Form->input('userAvatarAdded', array( 'label' => array('text' => '', 'value'=> 2, 'class'=>'labelform'), 'value' => 0, 'type' => 'hidden'));
echo $this->Form->input('avatarPath', array( 'label' => array('text' => '', 'value'=> 2, 'class'=>'labelform'), 'value' => 0, 'type' => 'hidden'));
?>
<h4 style="display:inline">Avatar: </h4>
<ul class="gallery fixed">
	<li>
		<div><a rel="gallery" href="javascript:;" class="upload-avatar" style="background: none;"></a></div>
		<img id="userAvatar" style="height:103px; width:103px;" src="<?php echo $this->Html->url('/img/avatar-m.jpg') ?>">
	</li>
</ul>
<div class="hr"></div>
<h1>Edereços e Telefones</h1>
<div class="hr"></div>
<?php
echo $this->Form->input('PessoaContato.endereco', array('label'=> array('text' => '<h4 style="display:inline">Endereço: </h4>', 'class'=>'labelform'), 'class'=>'normal', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaContato.complemento', array('label'=> array('text' => '<h4 style="display:inline">Complemento: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaContato.bairro', array('label'=> array('text' => '<h4 style="display:inline">Bairro: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));

echo $this->Form->input('PessoaContato.id_pais', array('label'=> array('text' => '<h4 style="display:inline">País: </h4>', 'class'=>'labelform'), 'class'=>'dropdown',  'type'=>'select', 'options' => $paises, 'value' => 33, 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaContato.id_estado', array('label'=> array('text' => '<h4 style="display:inline">Estado: </h4>', 'class'=>'labelform'), 'class'=>'dropdown',  'type'=>'select', 'options' => $estados,'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaContato.id_cidade', array('label'=> array('text' => '<h4 style="display:inline">Cidade: </h4>', 'class'=>'labelform'), 'class'=>'dropdown',  'type'=>'select', 'css' => array('display'=>'inline')));

echo $this->Form->input('PessoaContato.cep', array('label'=> array('text' => '<h4 style="display:inline">Cep: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
echo $this->Form->input('PessoaContato.email', array('label'=> array('text' => '<h4 style="display:inline">e-Mail: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaContato.telefone_1', array('label'=> array('text' => '<h4 style="display:inline">Telefone 1: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
echo $this->Form->input('PessoaContato.tipo_tel_1', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaContato.telefone_2', array('label'=> array('text' => '<h4 style="display:inline">Telefone 2: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
echo $this->Form->input('PessoaContato.tipo_tel_2', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
echo $this->Form->input('PessoaContato.telefone_3', array('label'=> array('text' => '<h4 style="display:inline">Telefone 3: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
echo $this->Form->input('PessoaContato.tipo_tel_3', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
?>
<br clear="all"/>
<div style='margin: 15px 30% 15px; width: 40%'>
<?php
echo $this->Form->end(array('class' => 'button-blue', 'label' => 'Salvar', 'div' => false));
?>
</div>