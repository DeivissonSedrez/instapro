
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

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold|PT+Sans+Narrow:regular,bold|Droid+Serif:i&amp;v1' rel='stylesheet' type='text/css' />

	
	<?php echo $this->Html->script(array('jquery-1.11.1.js')); ?>
	
	<!-- Scripts -->

	<?php //echo $this->Html->script(array('custom.js'));?> 
	<?php echo $this->Html->script(array('jquery.maskedinput.js')); ?>

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
							<span>Bem Vindo <a href="#"><?php echo CakeSession::read('User.login'); ?> !</a></span>
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
						<li class="first active">
							<div><?php echo $this->Html->link('DashBoard', array('controller' => 'home', 'action' => 'index'));?><span class="icon-nav dashboard"></span></div>
							<div class="back"></div>
						</li>				
						<li>
							<div><?php echo $this->Html->link('Processos', array('controller' => 'processos', 'action' => 'index'));?><span class="icon-nav interface-elements"></span></div>
							<div class="back"></div>
						</li>		
						<li>
							<div><?php echo $this->Html->link('Usuários', array('controller' => 'pessoas', 'action' => 'index'));?><span class="icon-nav users"></span></div>
							<div class="back"></div>
						</li>
						
						<li>
							<div></div>
							<div class="back"></div>
						</li>
						<li>
							<div></div>
							<div class="back"></div>
						</li>
						<li>
							<div></div>
							<div class="back"></div>
						</li>
						<li>
							<div></div>
							<div class="back"></div>
						</li>
						<li>
							<div></div>
							<div class="back"></div>
						</li>
						<li class="last">
							<div></div>
							<div class="back"></div>
						</li>
					</ul>
				</div>			
				
				<div id="content">
				<?php echo $content_for_layout; ?>
					<!--<div class="fixed index-large-icon">
						<a href="#" class="large-icon one"><span></span></a>
						<a href="#" class="large-icon two"><span></span></a>
						<a href="#" class="large-icon three"><span></span></a>
						<a href="#" class="large-icon four"><span></span></a>
						<a href="#" class="large-icon five"><span></span></a>
						<a href="#" class="large-icon six"><span></span></a>
						<a href="#" class="large-icon seven last"><span></span></a>
						<a href="#" class="large-icon ten"><span></span></a>
						<a href="#" class="large-icon eleven"><span></span></a>
						<a href="#" class="large-icon twelve"><span></span></a>
						<a href="#" class="large-icon thirteen"><span></span></a>
						<a href="#" class="large-icon fourteen"><span></span></a>
						<a href="#" class="large-icon fifteen"><span></span></a>
						<a href="#" class="large-icon sixteen last"><span></span></a>
					</div>
					
					<div class="notice-one">Hi there! I’m just a warning.
						<span></span>
					</div>
					
					<div id="sample-calendar" class="calendar-wrapper"></div>
					
					<h1 class="m-top-30">Accordions &amp; Tabs</h1>
					<div class="hr"></div>  
					
					<div class="fixed">
						<div class="col-310">
							<div class="panel">
								<div class="tabs">
									<ul>
										<li class="active"><a href="#" rel="tab-01-content">First tab here</a></li>
										<li><a href="#" rel="tab-02-content">Tab 2</a></li>
										<li class="last"><a href="#" rel="tab-03-content">Tab 3</a></li>
									</ul>
								</div>
								
								<div class="tabs-content">
								
									<div id="tab-01-content" class="active">
										<p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit eget vulputate ac, iaculis in orci. Donec at sapien est, non congue nulla. Vestibulum ac mauris at augue volutpat euismod. tiam ultrices, purus quis setardignissim gravida lorem ipsum.</p>
									</div>
									
									<div id="tab-02-content">
										<p>Pellentesque tincidunt est nec odio fringilla bibendum. Aenean in justo neque, non lobortis ante. Vestibulum vitae turpis ut erat pretium eleifend et vel lorem. Donec nibh mauris, fermentum a elementum at, pretium et velit. Curabitur auctor ante a justo consequat tristique. Nulla facilisi. Cras sem risus, dictum placerat ullamcorper id, tempus nec tortor. Aenean sollicitudin pulvinar enim, at condimentum mauris mollis vel.	</p>
									</div>
								
									<div id="tab-03-content">
										<p>Felis id venenatis consectetur, sem sem rutrum lectus, ut tristique metus augue ac justo. Suspendisse mauris lectus, scelerisque nec commodo in, aliquet a ligula. Praesent auctor lobortis adipiscing. Nulla  elit massa, ultrices in iaculis nec, elementum a magna. Pellentesque ut magna id nunc iaculis facilisis.</p>
									</div>
								
								</div>
							</div>
						</div>
						
						<div class="col-310 last">
							<ul class="accordion fixed">
								<li class="current">
									<h4 class="first">Suspendisse urna mauris<span></span></h4>
									<div><p>Vestibulum enim lectus, porta venenatis adipiscing nec, varus nec neque. Morbi vitae felis eget mauris ultricies mollis. Cras quis nibh ut quam tempus posuere. In id odio tellus, ac suscipit dui.</p></div>
									
								</li>
								<li>
									<h4>Nam ut lorem odio<span></span></h4>
									<div><p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit</p></div>
								</li>
								<li>
									<h4>Nunc eget metus a nisi lobortis cursus<span></span></h4>
									<div><p>Vestibulum enim lectus, porta venenatis adipiscing nec, varus nec neque. Morbi vitae felis eget mauris ultricies mollis. Cras quis nibh ut quam tempus posuere. In id odio tellus, ac suscipit dui.</p></div>
								</li>
								<li class="last">
									<h4>Pellentesque habitant morbi tristique<span></span></h4>
									<div><p>Sed lobortis, metus quis elementum egestas, inmagna lacus pharetra risus, a tincidunt elit lacus sed neque. Phasellus quam ante, hendrerit</p></div>
								</li>
							</ul>
						</div>	
					</div>
					
					<h1 class="m-top-30">Gallery</h1>
					<ul class="gallery fixed">
						<li>
							<div><a href="_content/gallery-img1.png" rel="gallery"></a></div>
							<img src="_content/gallery-img1.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img1-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img2.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img3-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img3.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img4-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img4.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img5-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img5.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img6-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img6.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img7-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img7.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img8-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img8.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img9-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img9.png" alt="" />
						</li>
						
						<li>
							<div><a href="_content/gallery-img10-original.png" rel="gallery"></a></div>
							<img src="_content/gallery-img10.png" alt="" />
						</li>
					</ul>
					
					<h1 class="m-top-30">Buttons with icons</h1>
					<div class="hr"></div>
					
					<a href="#" class="button-orange arrow">Le Button<span></span></a>&nbsp;&nbsp;&nbsp;
					<a href="#" class="button-blue arrow">Le Button<span></span></a>&nbsp;&nbsp;&nbsp;
					<a href="#" class="button-blue-light arrow">Le Button<span></span></a>&nbsp;&nbsp;&nbsp;
					<a href="#" class="button-green arrow">Le Button<span></span></a>&nbsp;&nbsp;&nbsp;
					<a href="#" class="button-brown arrow">Le Button<span></span></a>
					<a href="#" class="button-grey arrow m-top-15">Le Button<span></span></a>
					-->
				</div>
		
	</div>
</body>
</html>
