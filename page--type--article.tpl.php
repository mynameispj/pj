<header id="page" class="clearfix">
	<?php print render($primary_local_tasks); ?>
	<h2><a href="/">PJ McCormick</a> Designer, developer, cancer patient/survivor, writer, and, y'know, other stuff.</h2>
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
	<?php if ($node->nid != 57):?>
		<div class="banner longRoadBack">
			<h3><a href="http://www.amazon.com/gp/product/B008OUVF7K/ref=as_li_ss_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=B008OUVF7K&linkCode=as2&tag=mnip-20" onClick="_gaq.push(['_trackEvent', 'Long Road Back Promos', 'Top Banner']);">New fiction: Long Road Back. A brief, haunting tale of loss. $1, buy on Amazon.com</a></h3>
		</div>
	<?php endif; ?>
</header>

<article class="clearfix">
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
	<?php print render($page['content']); ?>