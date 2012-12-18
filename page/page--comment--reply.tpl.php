<header id="page" class="clearfix">
	<?php print render($primary_local_tasks); ?>
	<h2><a href="/">PJ McCormick</a> | User Experience Designer, Web Developer, Cancer Patient</h2>
	
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

<article class="clearfix" id="blogRoll">
	<?php if ($tabs): ?>
		<div class="tabs">
			<?php print render($tabs); ?>
		</div>
	<?php endif; ?>
	<?php print render($secondary_local_tasks); ?>
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
	<div class="articleWrap">
		<?php print render($page['content']); ?>
	</div>
	<section class="sidebar">
		<?php print render($page['sidebar']); ?>
	</section> <?php //closes <section> opened in node--article.tpl.php ?>
	<a class="showSidebar"><div class="arrow-left"></div></a>

</article>	
	