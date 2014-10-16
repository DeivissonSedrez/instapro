
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html dir="ltr" lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<?php echo $this->Html->charset(); ?>
	<title>
		InstaPro
	</title>
	<?php echo $this->Html->css(array('style.css'));?> 
	<?php echo $this->Html->css(array('jquery.fullcalendar/fullcalendar.css'));?> 
	<?php echo $this->Html->css(array('jquery.fullcalendar/fullcalendar.print.css'));?> 
	<?php echo $this->Html->css(array('jquery.fileupload.css'));?> 
	<?php echo $this->Html->css(array('nanoscroller.css'));?> 
	<?php echo $this->Html->css(array('jquery.qtip.css')); ?> 
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold|PT+Sans+Narrow:regular,bold|Droid+Serif:i&amp;v1' rel='stylesheet' type='text/css' />
	<?php echo $this->Html->script(array('jquery-1.11.1.js')); ?>	
	<?php echo $this->Html->script(array('jquery-ui.min.js')); ?>
	<?php echo $this->Html->script(array('jquery.ui.widget.js')); ?>
	<?php echo $this->Html->script(array('custom.js')); ?>
	<?php echo $this->Html->script(array('jquery.nanoscroller.min.js')); ?>	
    <?php echo $this->Html->script(array("jquery.qtip.min.js")); ?>

		
	<!-- Scripts -->
	
	<?php echo $this->Html->script(array('jquery.maskedinput.js')); ?>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>

	<?php echo $this->Html->script(array('fileupload/jquery.fileupload.js')); ?>
	<?php echo $this->Html->script(array('fileupload/jquery.iframe-transport.js')); ?>
	<?php echo $this->Html->script(array('fileupload/jquery.process.js')); ?>
	<?php echo $this->Html->script(array('fileupload/jquery-image.js')); ?>

</head>

</head>
<body>
	<?php echo $this->Form->input('base', array('id' => 'base', 'value' => $this->base, 'type' => 'hidden')) ?>
	<div id="layout">
		<div id="header-wrapper">
			<div id="header">
				<div id="user-wrapper" class="fixed">
					<div class="color-scheme">
						<!--<a href="#" class="button">Dropdown suggestion</a>-->
					</div>
					<div class="user">
						<!--<img src="_content/user-img.png" alt="" />-->
						<span>Bem Vindo <a href="#"><?php echo CakeSession::read('User.nome'); ?> !</a></span>
						<span class="logout"><a href="<?php echo $this->Html->url('/pessoas/logout') ?>">Sair</a></span>
					</div>
				</div>
				<div id="launcher-wrapper" class="fixed">
					<div class="logo">
							<!--?php echo $this->Html->link(
							$this->Html->image("back-logo.png",array("alt"=> "InstaPro Portal Jurídico", "border" => "0")), 
							array(
								'controller' => 'home', 
								'action' => 'index','comments' => 'false'));?-->
								<a href="/instapro/home"><?php echo $this->Html->image('back-logo.png',array('alt' => 'InstaPro Portal Jurídico', 'border' => '0'));?> </a>
							</div>
							
							<div class="launcher">
								<ul class="fixed">
									<li class="users"><?php echo $this->Html->link('Usuários', array('controller' => 'pessoas', 'action' => 'index'));?></li>
								<!--li class="mailbox">
									<a href="#">Mailbox</a>
									<span class="red-bullet"></span>
								</li-->
								<!--li class="dialog"><a href="#">Dialog</a></li-->
								<li class="settings last"><a href="#">Configurações</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="page">
				<div id="sidebar">
					<ul id="navigation">
						<li class="first">
							<div><?php echo $this->Html->link('DashBoard', array('controller' => 'home', 'action' => 'index'));?><span class="icon-nav dashboard"></span></div>
							<div class="back"></div>
						</li>
						<?php
						//para ficar com um layout bonito, botaremos 8 linhas no menu alem do dashboard, usaremos um for até a varivel limite
						//enquanto a variavel da sessao tiver permissao par aos modulos usaremos ela, o resto o for completa com linhas brancas
						$limite =7;
						$cont=0;
						foreach(CakeSession::read('User.permissions') as $modulo){
							
							//aproveita esse foreach e seta as permissoes de escrita nos modulos direto na sessao para consulta posterior
							if($modulo['PessoaModulo']['visualiza']==1){	
							    $cont++;							
                                echo "<li>
							           <div>".$this->Html->link($modulo['Modulo']['nome'], array('controller' =>  strtolower($modulo['Modulo']['nome']), 'action' => 'index'))."<span class='icon-nav interface-elements'></span></div>				
							           <div class='back'></div>
						              </li>";
						        CakeSession::write('User.'.strtolower($modulo['Modulo']['nome']),$modulo['PessoaModulo']['cadastra']);							
					         }
						}
						for($x=$cont; $x<$limite; $x++){
						echo "<li>
						    	<div></div>
							    <div class='back'></div>
						      </li>";
						}

						?> 	
					</ul>
				</div>			
				
				<div id="content">
					<?php echo $content_for_layout; ?>
					
			</div>
			
		</div>
	</body>
	</html>
