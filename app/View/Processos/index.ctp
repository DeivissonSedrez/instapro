<?php
echo $this->Html->script("scripts");
?>
<div id="breadcrumbbox">
	<ul class="breadcrumb">
		<li class="home"><a href="/instapro/"></a></li>		
		<li class="last"><a href="/instapro/processos">Processos</a></li>
	</ul>
</div>
<div class="panelcmd">
	<?php echo $this->Form->create('buscaProc')?>
	<?php echo $this->Html->link('Incluir', array('controller'=> 'processos', 'action' => 'adicionar'), array('class' => 'button-blue'));?>&nbsp;&nbsp;
	<?php echo $this->Html->link('Alterar', array('controller'=> 'processos', 'action' => '#'), array('class' => 'button-grey', 'disabled' => 'disabled'));?>
	<div style="position:relative; float:right;">
		<?php echo $this->Form->input('valor', array('label'=>false, 'type' => 'text', 'class'=>'small', 'maxlength'=>100, 'div'=>false));?>&nbsp;&nbsp;
		<a href="#" class='button-grey arrow'>Buscar<span></span></a>
		<a href="#" id="btnLimparProc" class='button-grey'>Limpar<span></span></a>
	</div>
	<?php echo $this->Form->end();?>
</div>
<div id="div-result" class="result-search">
	
</div>
<div class="process-panel">
	<div>
		<table class="tableProc">
			<tr>
				<td>Pasta: </td><td>Escritório: </td>
			</tr>
			<tr>
				<td>Titulo: </td><td>Cliente: </td>
			</tr>
			<tr>
				<td>Ação: </td><td>Posição Cliente: </td>
			</tr>
			<tr>
				<td>Natureza: </td><td>Advogado Responsável: </td>
			</tr>
			<tr>
				<td>Fase: </td><td>Parte Contraria: </td>
			</tr>
			<tr>
				<td>Nº Inicial: </td><td>Orgão Inicial: </td>
			</tr>
			<tr>
				<td>Nº Principal: </td><td>Orgão Principal: </td>
			</tr>
			<tr>
				<td> Contrato/Negociação: </td><td>Cenrto de Custos: </td>
			</tr>
			<tr>
				<td>Risco: </td><td>Data Distribuição: </td>
			</tr>
			<tr>
				<td>Status: </td><td>Data Decisão: </td>
			</tr>			
		</table>
	</div>
	<div class="panel">
		<div class="tabs">
			<ul>
				<li class="active">
					<a rel="tab-01-content" href="#">Acompanhamento</a>
				</li>
				<li class="">
					<a rel="tab-02-content" href="#">Compromissos</a>
				</li>
				<li class="">
					<a rel="tab-03-content" href="#">Documentos</a>
				</li>
				<li class="last">
					<a rel="tab-04-content" href="#">Envolvidos</a>
				</li>
			</ul>
		</div>
		<div class="tabs-content first-tab">
			<div id="tab-01-content" class="active" style="display: block;">
			<div class="panel2">
		<div class="tabs2">
			<ul>
				<li class="active2">
					<a rel="tab-05-content" href="#">1ª Instância</a>
				</li>
				<li class="">
					<a rel="tab-06-content" href="#">2ª Instância</a>
				</li>
				<li class="">
					<a rel="tab-07-content" href="#">3ª Instância</a>
				</li>
				<li class="last">
					<a rel="tab-08-content" href="#">4ª Instância</a>
				</li>
				<li class="last">
					<a rel="tab-09-content" href="#">Todas</a>
				</li>
			</ul>
		</div>
		<div class="tabs-content2 first-tab2">
			<div id="tab-05-content" class="active2" style="display: block;">
				<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
			<div id="tab-06-content" class="" style="display: none;">
				<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
			<div id="tab-07-content" class="" style="display: none;">
			<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
			<div id="tab-08-content" class="" style="display: none;">
			<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
			<div id="tab-09-content" class="" style="display: none;">
			<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
		</div>
	</div>
				<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.
				Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
			<div id="tab-02-content" class="" style="display: none;">
				<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.
				Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
			<div id="tab-03-content" class="" style="display: none;">
			<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.
			Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
			<div id="tab-04-content" class="" style="display: none;">
			<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.
			Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
			</div>
		</div>
	</div>
</div>