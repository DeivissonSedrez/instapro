<?php 
error_reporting(0);
		$modulo = CakeSession::read('User.permissions');
		if($modulo[0]['PessoaModulo']['cadastra']==1){
		    $edita= "";
		    $crumb="Editar";
		}
		else{
			$edita="disabled";
		    $crumb="Visualizar";	
		}
?> 
<br>
<?php
echo $this->Html->script("scripts");
echo $this->Html->script("avatar");
?>
<script>
	$( document ).ready(function() {
		$("#alteraSenha").click(function(){
			 var container = $("#boxSenha");
			if ( container.is(':visible') ) {	    
				container.toggle('scale',{ percent: 0 },500);
				$("#alteraSenha").show();
			  // container.html("");
			} else { 
			   container.toggle('scale',{ percent: 100 },500);
				$("#alteraSenha").hide();
				//container.html()="";
			}			
		});
	});
	$(document).mouseup(function (e)
	{
	    var container = $("#boxSenha");
		if ( $("#boxSenha").is(':visible') ) {	
		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		    	
		        	container.toggle('scale',{ percent: 0 },500);
					$("#alteraSenha").show();
		        	//container.html("");
		    }
		}
	});
</script>
<div id="breadcrumbbox">
	<ul class="breadcrumb">
		<li class="home"><a href="/instapro/"></a></li>		
		<li class=""><a href="/instapro/pessoas">Pessoas</a></li>
		<li class="last"><a href="/instapro/pessoas/visualizar"><?php echo $crumb ?></a></li>
	</ul>
</div>
<h3 style="margin-left: 40%;"><?php echo $this->Session->flash(); ?></h3>
<div  class="frame-big pad10">
	<h3>Dados de Login</h3>
	<div class="hr"></div>
	<?php 
	echo $this->Form->create('Pessoas', array('enctype' => 'multipart/form-data', 'action'=>'/editar/'.$Pessoas['Pessoas']['id']));
	?>
	<?php 
	/*print "<pre>";
	print_r($Pessoas);
	print "</pre>";*/
	?>
	<TABLE>
		<tr>
			<td width="395" style="border-right:1px solid #ccc;">
				<?php
				$acesso=$Pessoas['Pessoas']['tipo_acesso'];
				echo $this->Form->input('tipo_acesso', array('label'=> array('text' => '<h4 style="display:inline">Tipo Usuário: </h4>', 'class'=>'labelform'), 'disabled'=>$edita, 'class'=>'dropdown small', 'type'=>'select', 'options' => $permissoes,  'default'=>$acesso, 'css' => array('display'=>'inline'))); 
				echo $this->Form->input('login', array('label'=> array('text' => '<h4 style="display:inline">Login: </h4>', 'class'=>'labelform'), 'disabled'=>'disabled', 'value'=>$Pessoas['Pessoas']['login'], 'class'=>'small',  'css' => array('display'=>'inline')));
				/*echo $this->Form->input('password', array('label'=> array('text' => '<h4 style="display:inline">Senha: </h4>', 'class'=>'labelform'), 'disabled'=>$edita,  'class'=>'small', 'type'=>'password','css' => array('display'=>'inline')));
				echo $this->Form->input('password2', array('label'=> array('text' => '<h4 style="display:inline">Confirme a senha: </h4>', 'class'=>'labelform'), 'disabled'=>$edita, 'class'=>'small','type'=>'password', 'css' => array('display'=>'inline')));*/
				if(CakeSession::read('User.admin')){
                     echo "<button class = 'button-blue-input' id='alteraSenha' type='button' style='white-space:nowrap; width:100px;'>Alterar senha</button>";
				}
				echo $this->Form->input('id', array('value' => $Pessoas['Pessoas']['id'], 'type' => 'hidden'));
				?>
			</td>
			<td style="padding: 0px 0px 0px 25px;"><?php
                echo $this->Form->input('PessoaModulo.0.visualiza', array('label'=> array('text' => '<h4 style="display:inline">Visualiza Processos: </h4>',  'class'=>'labelform'),'disabled'=>$edita,'default'=>$PessoaModulo[0]['PessoaModulo']['visualiza'], 'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));				
				echo $this->Form->input('PessoaModulo.0.cadastra', array('label'=> array('text' => '<h4 style="display:inline">Cadastra Processos: </h4>',  'class'=>'labelform'),'disabled'=>$edita, 'default'=>$PessoaModulo[0]['PessoaModulo']['cadastra'], 'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaModulo.0.id_modulo', array('type'=>'hidden', 'default'=>'2'));
				echo $this->Form->input('PessoaModulo.0.id_pessoa_modulo', array('type'=>'hidden', 'default'=>$PessoaModulo[0]['PessoaModulo']['id_pessoa_modulo']));
				echo $this->Form->input('PessoaModulo.1.visualiza', array('label'=> array('text' => '<h4 style="display:inline">Visualiza Pessoas: </h4>',  'class'=>'labelform'),'disabled'=>$edita, 'default'=>$PessoaModulo[1]['PessoaModulo']['visualiza'],'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaModulo.1.cadastra', array('label'=> array('text' => '<h4 style="display:inline">Cadastra Pessoas: </h4>',  'class'=>'labelform'),'disabled'=>$edita, 'default'=>$PessoaModulo[1]['PessoaModulo']['cadastra'],'class'=>'dropdown small', 'type'=>'select', 'options' => array('1' => 'Sim', '0' => 'Não'), 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaModulo.1.id_modulo', array('type'=>'hidden', 'default'=>'1'));
				echo $this->Form->input('PessoaModulo.1.id_pessoa_modulo', array('type'=>'hidden', 'default'=>$PessoaModulo[1]['PessoaModulo']['id_pessoa_modulo']));
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
				echo $this->Form->input('nome', array('label'=> array('text' => '<h4 style="display:inline">Nome: </h4>', 'class'=>'labelform'), 'disabled'=>$edita, 'value'=>$Pessoas['Pessoas']['nome'], 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.tratamento', array('label'=> array('text' => '<h4 style="display:inline">Tratamento: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaFisica']['tratamento'],  'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.estado_civil', array('label'=> array('text' => '<h4 style="display:inline">Estado Civil: </h4>', 'class'=>'labelform'),'disabled'=>$edita,  'class'=>'dropdown small', 'type'=>'select', 'options' => array('S' => 'Solteiro', 'C' => 'Casado', 'D' => 'Divorciado', 'V' => 'Viuvo'), 'default'=>$Pessoas['PessoaFisica']['estado_civil'],  'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.sexo', array('label'=> array('text' => '<h4 style="display:inline">Sexo: </h4>', 'class'=>'labelform'),'disabled'=>$edita,  'default'=>$Pessoas['PessoaFisica']['sexo'], 'class'=>'dropdown small', 'type'=>'select', 'options' => array('M' => "Masculino", 'F' => 'Feminino'),'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.ctps_num', array('label'=> array('text' => '<h4 style="display:inline">CTPS Número: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaFisica']['ctps_num'],  'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.ctps_serie', array('label'=> array('text' => '<h4 style="display:inline">CTPS Série: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaFisica']['ctps_serie'],  'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.oab', array('label'=> array('text' => '<h4 style="display:inline">OAB: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaFisica']['oab'],  'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
                $nasc=implode("/",array_reverse(explode("-", $Pessoas['PessoaFisica']['data_nascimento'])));
				echo $this->Form->input('PessoaFisica.data_nascimento', array('label'=> array('text' => '<h4 style="display:inline">Data de Nascimento: </h4>', 'class'=>'labelform'),'disabled'=>$edita,  'value'=>$nasc,  'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				?>
			</td>
			<td style="padding: 0px 0px 0px 25px;"><?php
				echo $this->Form->input('PessoaFisica.nacionalidade', array('label'=> array('text' => '<h4 style="display:inline">Nacionalidade: </h4>', 'class'=>'labelform'),'disabled'=>$edita,  'value'=>$Pessoas['PessoaFisica']['nacionalidade'], 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.rg', array('label'=> array('text' => '<h4 style="display:inline">RG: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaFisica']['rg'],  'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.cpf', array('label'=> array('text' => '<h4 style="display:inline">CPF: </h4>', 'class'=>'labelform'),'disabled'=>$edita,  'value'=>$Pessoas['PessoaFisica']['cpf'], 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.profissao', array('label'=> array('text' => '<h4 style="display:inline">Profissão/Ocupação: </h4>', 'class'=>'labelform'),'disabled'=>$edita,  'value'=>$Pessoas['PessoaFisica']['profissao'], 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaFisica.matricula_codigo', array('label'=> array('text' => '<h4 style="display:inline">Matrícula/Código: </h4>', 'class'=>'labelform'),'disabled'=>$edita,  'value'=>$Pessoas['PessoaFisica']['oab'], 'class'=>'small', 'type'=>'text', 'css' => array('display'=>'inline')));
				echo $this->Form->input('avatar', array( 'label' => array('text' => '', 'value'=> 2, 'class'=>'labelform'), 'style' => 'box-shadow: none; border: none; display:none;', 'disabled'=>$edita, 'class' => 'file', 'between' => '<br />','type' => 'file'));
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
				echo $this->Form->input('PessoaContato.endereco', array('label'=> array('text' => '<h4 style="display:inline">Endereço: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['endereco'],  'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.complemento', array('label'=> array('text' => '<h4 style="display:inline">Complemento: </h4>', 'class'=>'labelform'),'disabled'=>$edita,'value'=>$Pessoas['PessoaContato']['complemento'], 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.bairro', array('label'=> array('text' => '<h4 style="display:inline">Bairro: </h4>', 'class'=>'labelform'),'disabled'=>$edita,'value'=>$Pessoas['PessoaContato']['bairro'], 'class'=>'small', 'css' => array('display'=>'inline')));

				echo $this->Form->input('PessoaContato.id_pais', array('label'=> array('text' => '<h4 style="display:inline">País: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'class'=>'dropdown small',  'type'=>'select', 'options' => $paises, 'value'=>$Pessoas['PessoaContato']['id_pais'], 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.id_estado', array('label'=> array('text' => '<h4 style="display:inline">Estado: </h4>', 'class'=>'labelform'),'disabled'=>$edita,'value'=>$Pessoas['PessoaContato']['id_estado'], 'class'=>'dropdown small',  'type'=>'select', 'options' => $estados,'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.id_cidade', array('label'=> array('text' => '<h4 style="display:inline">Cidade: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['id_cidade'],'class'=>'dropdown small',  'type'=>'select', 'css' => array('display'=>'inline')));

				echo $this->Form->input('PessoaContato.cep', array('label'=> array('text' => '<h4 style="display:inline">Cep: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['cep'],'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				?>
			</td>
			<td style="padding: 0px 0px 0px 25px;"><?php
				echo $this->Form->input('PessoaContato.email', array('label'=> array('text' => '<h4 style="display:inline">e-Mail: </h4>', 'class'=>'labelform'), 'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['email'],'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.telefone_1', array('label'=> array('text' => '<h4 style="display:inline">Telefone 1: </h4>', 'class'=>'labelform'), 'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['telefone_1'],'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				echo $this->Form->input('PessoaContato.tipo_tel_1', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'),'disabled'=>$edita,'value'=>$Pessoas['PessoaContato']['tipo_tel_1'], 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.telefone_2', array('label'=> array('text' => '<h4 style="display:inline">Telefone 2: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['telefone_2'],'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				echo $this->Form->input('PessoaContato.tipo_tel_2', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['tipo_tel_2'], 'class'=>'small', 'css' => array('display'=>'inline')));
				echo $this->Form->input('PessoaContato.telefone_3', array('label'=> array('text' => '<h4 style="display:inline">Telefone 3: </h4>', 'class'=>'labelform'),'disabled'=>$edita, 'value'=>$Pessoas['PessoaContato']['telefone_3'], 'class'=>'small', 'css' => array('display'=>'inline'),'type' => 'text'));
				echo $this->Form->input('PessoaContato.tipo_tel_3', array('label'=> array('text' => '<h4 style="display:inline">Tipo: </h4>', 'class'=>'labelform'), 'disabled'=>$edita,'value'=>$Pessoas['PessoaContato']['tipo_tel_3'],'class'=>'small', 'css' => array('display'=>'inline')));
				?>
			</td>
		</tr>
	</TABLE>
	<br clear="all"/>
	<div style='margin-left: 50%; left:-45px; position:relative;'>
		<?php
		if(CakeSession::read('User.processos'))
		echo $this->Form->end(array('class' => 'button-blue-input', 'label' => 'Alterar', 'div' => false));
		?>
	</div>
</div>
	<div id="boxSenha">
		<h3>Dados de Login</h3>
		<div class="hr"></div>
		<?php 
		echo $this->Form->create('Senha', array('enctype' => 'multipart/form-data', 'action'=>'/AlteraSenha/'.$Pessoas['Pessoas']['id']));
		
		echo $this->Form->input('password', array('label'=> array('text' => '<h4 style="display:inline">Senha: </h4>', 'class'=>'labelform'), 'disabled'=>$edita,  'class'=>'small', 'type'=>'password','css' => array('display'=>'inline')));
			echo $this->Form->input('password2', array('label'=> array('text' => '<h4 style="display:inline">Confirme a senha: </h4>', 'class'=>'labelform'), 'disabled'=>$edita, 'class'=>'small','type'=>'password', 'css' => array('display'=>'inline')));
		?>
		<div style='margin-left: 50%; left:-45px; position:relative;'>
		<?php
		echo $this->Form->end(array('class' => 'button-blue-input', 'label' => 'Alterar Senha', 'div' => false));
		?>
		</div>
	</div>