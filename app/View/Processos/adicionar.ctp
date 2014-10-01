<?php


//echo $this->Html->script(array('jquery.maskedinput.js'));
echo $this->Html->script("scripts");
//$permite=CakeSession::read('User.permissions');
//		if(CakeSession::read('User.processos')==0)
//		    echo "<li class='last'><a href='/instapro/pessoas/adicionar'>Adicionar</a></li>";
//		
?>
<div id="breadcrumbbox">
	<ul class="breadcrumb">
		<li class="home"><a href="/instapro/"></a></li>		
		<li class=""><a href="/instapro/processos">Processos</a></li>
		<li class="last"><a href="/instapro/processos/adicionar">Adicionar</a></li>
	</ul>
</div>



<h3 style="margin-left: 40%;"><?php echo $this->Session->flash(); ?></h3>
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