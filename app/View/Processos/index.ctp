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
</div>