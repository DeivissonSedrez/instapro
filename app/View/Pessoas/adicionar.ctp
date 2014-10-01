<?php


//echo $this->Html->script(array('jquery.maskedinput.js'));
echo $this->Html->script("scripts");
echo $this->Html->script("avatar");
//$permite=CakeSession::read('User.permissions');
//		if(CakeSession::read('User.processos')==0)
//		    echo "<li class='last'><a href='/instapro/pessoas/adicionar'>Adicionar</a></li>";
//		
?>
<div id="breadcrumbbox">
	<ul class="breadcrumb">
		<li class="home"><a href="/instapro/"></a></li>		
		<li class=""><a href="/instapro/pessoas">Pessoas</a></li>
		<li class="last"><a href="/instapro/pessoas/adicionar">Adicionar</a></li>
	</ul>
</div>



<h3 style="margin-left: 40%;"><?php echo $this->Session->flash(); ?></h3>

<div  class="frame-big pad10">
	<h3>Dados de Login</h3>
	<div class="hr"></div>
	<?php 
	echo $this->Form->create('Pessoas', array('enctype' => 'multipart/form-data'));
	?>
	<TABLE>
		<tr>
			<td width="395" style="border-right:1px solid #ccc;">
				<?php
				echo $this->Form->input('tipo_acesso', array('label'=> array('text' => '<h4 style="display:inline">Tipo Usuário: </h4>',  'value'=> 3, 'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => $permissoes, 'css' => array('display'=>'inline'))); 
				echo $this->Form->input('login', array('label'=> array('text' => '<h4 style="display:inline">Login: </h4>', 'class'=>'labelform'), 'class'=>'small',  'css' => array('display'=>'inline')));
				echo $this->Form->input('password', array('label'=> array('text' => '<h4 style="display:inline">Senha: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'password','css' => array('display'=>'inline')));
				echo $this->Form->input('password2', array('label'=> array('text' => '<h4 style="display:inline">Confirme a senha: </h4>', 'class'=>'labelform'), 'class'=>'small','type'=>'password', 'css' => array('display'=>'inline')));
				?>
			</td>
			<td style="padding: 0px 0px 0px 25px;"><?php
				echo $this->Form->input('PessoaModulo.0.visualiza', array('label'=> array('text' => '<h4 style="display:inline">Visualiza Processos: </h4>',  'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));
				
				echo $this->Form->input('PessoaModulo.0.cadastra', array('label'=> array('text' => '<h4 style="display:inline">Cadastra Processos: </h4>',  'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));
				echo "<input type='hidden' id='' value='2'  name='data[PessoaModulo][0][id_modulo]'";
				echo $this->Form->input('PessoaModulo.1.visualiza', array('label'=> array('text' => '<h4 style="display:inline">Visualiza Pessoas: </h4>',  'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaModulo.1.cadastra', array('label'=> array('text' => '<h4 style="display:inline">Cadastra Pessoas: </h4>',  'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));
				echo "<input type='hidden' id='' value='1'  name='data[PessoaModulo][1][id_modulo]'";
				?>
			</td>
		</tr>
	</TABLE></br>
	<div class="hr"></div>
	<h3>Dados Pessoais</h3>
	<div class="hr"></div>
	<TABLE>
		<tr>
			<td width="395" style="border-right:1px solid #ccc;">
				<?php
				echo $this->Form->input('nome', array('label'=> array('text' => '<h4 style="display:inline">Nome: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.tratamento', array('label'=> array('text' => '<h4 style="display:inline">Tratamento: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.estado_civil', array('label'=> array('text' => '<h4 style="display:inline">Estado Civil: </h4>', 'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('S' => 'Solteiro', 'C' => 'Casado', 'D' => 'Divorciado', 'V' => 'Viuvo'), 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.sexo', array('label'=> array('text' => '<h4 style="display:inline">Sexo: </h4>', 'class'=>'labelform'), 'class'=>'dropdown small', 'type'=>'select', 'options' => array('M' => "Masculino", 'F' => 'Feminino'),'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.ctps_num', array('label'=> array('text' => '<h4 style="display:inline">CTPS Número: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.ctps_serie', array('label'=> array('text' => '<h4 style="display:inline">CTPS Série: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.oab', array('label'=> array('text' => '<h4 style="display:inline">OAB: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));

				echo $this->Form->input('PessoaFisica.data_nascimento', array('label'=> array('text' => '<h4 style="display:inline">Data de Nascimento: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				?>
			</td>
			<td style="padding: 0px 0px 0px 25px;"><?php
				echo $this->Form->input('PessoaFisica.nacionalidade', array('label'=> array('text' => '<h4 style="display:inline">Nacionalidade: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.rg', array('label'=> array('text' => '<h4 style="display:inline">RG: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.cpf', array('label'=> array('text' => '<h4 style="display:inline">CPF: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.profissao', array('label'=> array('text' => '<h4 style="display:inline">Profissão/Ocupação: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.matricula_codigo', array('label'=> array('text' => '<h4 style="display:inline">Matrícula/Código: </h4>', 'class'=>'labelform'), 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('avatar', array( 'label' => array('text' => '', 'value'=> 2, 'class'=>'labelform'), 'style' => 'box-shadow: none; border: none; display:none;', 'class' => 'file', 'between' => '<br />','type' => 'file'));
				echo $this->Form->input('userAvatarAdded', array( 'label' => array('text' => '', 'value'=> 2, 'class'=>'labelform'), 'value' => 0, 'type' => 'hidden'));
				echo $this->Form->input('avatarPath', array( 'label' => array('text' => '', 'value'=> 2, 'class'=>'labelform'), 'value' => 0, 'type' => 'hidden'));
				?>
				<label class="labelform" for="userAvatar"><h4 style="display:inline">Avatar: </h4></label>
				<ul class="gallery fixed" style="margin-left: 186px; margin-top:-15px;">
					<li>
						<div><a rel="gallery" href="javascript:;" class="upload-avatar" style="background: none;"></a></div>
						<img id="userAvatar" style="height:103px; width:103px;" src="<?php echo $this->Html->url('/img/avatar-m.jpg') ?>">
					</li>
				</ul>

			</td>
		</tr>
	</TABLE></br>
	<div class="hr"></div>
	<h3>Endereços e Telefones</h3>
	<div class="hr"></div>
	<TABLE>
		<tr>
			<td width="395" style="border-right:1px solid #ccc;">
				<?php
				echo $this->Form->input('PessoaContato.endereco', array('label'=> array('text' => '<h4 style="display:inline">Endereço: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.complemento', array('label'=> array('text' => '<h4 style="display:inline">Complemento: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.bairro', array('label'=> array('text' => '<h4 style="display:inline">Bairro: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));

				echo $this->Form->input('PessoaContato.id_pais', array('label'=> array('text' => '<h4 style="display:inline">País: </h4>', 'class'=>'labelform'), 'class'=>'dropdown small',  'type'=>'select', 'options' => $paises, 'value' => 33, 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.id_estado', array('label'=> array('text' => '<h4 style="display:inline">Estado: </h4>', 'class'=>'labelform'), 'class'=>'dropdown small',  'type'=>'select', 'options' => $estados,'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.id_cidade', array('label'=> array('text' => '<h4 style="display:inline">Cidade: </h4>', 'class'=>'labelform'), 'class'=>'dropdown small',  'type'=>'select', 'css' => array('display'=>'inline')));

				echo $this->Form->input('PessoaContato.cep', array('label'=> array('text' => '<h4 style="display:inline">Cep: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				?>
			</td>
			<td style="padding: 0px 0px 0px 25px;"><?php
				echo $this->Form->input('PessoaContato.email', array('label'=> array('text' => '<h4 style="display:inline">e-Mail: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.telefone_1', array('label'=> array('text' => '<h4 style="display:inline">Telefone 1: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				echo $this->Form->input('PessoaContato.tipo_tel_1', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.telefone_2', array('label'=> array('text' => '<h4 style="display:inline">Telefone 2: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				echo $this->Form->input('PessoaContato.tipo_tel_2', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.telefone_3', array('label'=> array('text' => '<h4 style="display:inline">Telefone 3: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				echo $this->Form->input('PessoaContato.tipo_tel_3', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'), 'class'=>'small', 'css' => array('display'=>'inline')));
				?>
			</td>
		</tr>
	</TABLE>
	<br clear="all"/>
	<div style='margin-left: 50%; left:-45px; position:relative;'>
		<?php
		echo $this->Form->end(array('class' => 'button-blue-input', 'label' => 'Salvar', 'div' => false));
		?>
	</div>