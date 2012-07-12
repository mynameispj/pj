<a id="top"></a>
<header id="page" class="clearfix">
	<?php print render($primary_local_tasks); ?>
	<h1><a href="/">I design and build web sites, brands, apps, logos, and other useful things.</a></h1>
	<a class="showMenu">Menu <span class="arrow-down"></span> </a>
	<nav>
		<?php print theme('links__system_main_menu', array(
	      'links' => $main_menu,
	      'attributes' => array(
	        'id' => 'main-menu-links',
	        'class' => array('links', 'clearfix'),
	      ),
	      'heading' => array(
	        'text' => t('Main menu'),
	        'level' => 'h2',
	        'class' => array('element-invisible'),
	      ),
	    )); ?>

	</nav>
</header>
<div id="loading"></div>
<article class="clearfix">
	<div id="bodyWrap">
		<div class="header">
			<div class="title"></div>
			<div class="controls">
				<!--<a href="">Previous project</a>
				<a href="">Next project</a>-->
				<a class="closeProject" href="">&times;</a>
			</div>
		</div>
		<div id="body">
			<div id="lead">
				<div class="intro"></div>
				
			</div>
			<div id="otherImages"></div>
			<div id="words"></div>
		</div>
	</div>
	<h2 class="element-invisible">Some of the design projects I've worked on.</h2>
	<?php print render($page['worklist']); ?>
	<div id="content" class="clearfix">
		<div class="element-invisible"><a id="main-content"></a></div>
		<?php if ($messages): ?>
			<div id="console" class="clearfix"><?php print $messages; ?></div>
		<?php endif; ?>
		<?php if ($page['help']): ?>
			<div id="help">
			  <?php print render($page['help']); ?>
			</div>
		<?php endif; ?>
		<?php if ($action_links): ?>
			<ul class="action-links"><?php print render($action_links); ?></ul>
		<?php endif; ?>
	</div>
</article>