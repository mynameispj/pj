<header id="page" class="clearfix">
	<div id="headerContent">
		<?php print render($primary_local_tasks); ?>
		<h1><a href="/">I design web sites, brands, apps, logos, and other useful things.</a></h1>
		
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
	</div>
</header>
<div id="loading"></div>
<article class="clearfix">
	<h2 class="element-invisible">Some of the design projects I've worked on.</h2>
	<div id="body">
		<div id="lead">
			<div class="intro"></div>
			
		</div>
		<div id="words"></div>
	</div>
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
