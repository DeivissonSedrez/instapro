<div id="breadcrumbbox">
	<ul class="breadcrumb">
		<li class="home"><a href="/instapro/"></a></li>		
		<li class="last"><a href="/instapro/pessoas">Pessoas</a></li>
	</ul>
</div>

<div class="panelcmd" style="display:in-line">
<?php $sizes = array('s' => 'Small', 'm' => 'Medium', 'l' => 'Large'); ?>
	<?php echo $this->Form->create('busca')?>
	<?php echo $this->Html->link('Novo Usuário', array('controller'=> 'pessoas', 'action' => 'adicionar'), array('class' => 'button-blue'));?>
	<div style="position:relative; float:right;">
	<?php echo $this->Form->input('valor', array('label'=>false, 'type' => 'text', 'class'=>'small',              'maxlength'=>100, 'div'=>false));?>
	<a href="#" class='button-grey arrow'>Buscar<span></span></a>
	</div>
	<?php echo $this->Form->end();?>
</div>
<div class="frame-big">
	<div class="listaalfabeto">
		<ul>
			<li>A</li>
			<li>B</li>
			<li>C</li>
			<li>D</li>
			<li>E</li>
			<li>F</li>
			<li>G</li>
			<li>H</li>
			<li>I</li>
			<li>J</li>
			<li>K</li>
			<li>L</li>
			<li>M</li>
			<li>N</li>
			<li>O</li>
			<li>P</li>
			<li>Q</li>
			<li>R</li>
			<li>S</li>
			<li>T</li>
			<li>U</li>
			<li>V</li>
			<li>X</li>
			<li>Y</li>
			<li>X</li>
			<li>W</li>
			<li>Z</li>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>5</li>
			<li>6</li>
			<li>7</li>
			<li>8</li>
			<li>9</li>
			<li>0</li>
		</ul>
	</div>
	<div>
		<ul>
			<?php foreach($pessoas as $pessoa){
				echo "<li>".$pessoa['Pessoas']['nome']."</li>";
			} ?>
		</ul>
	</div>
</div>