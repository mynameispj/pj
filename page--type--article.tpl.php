<?php
// $Id: page.tpl.php,v 1.15 2010/11/20 04:03:51 webchick Exp $
?>
<header class="clearfix">
	<?php print render($primary_local_tasks); ?>
	<h2><a href="/">My name is PJ McCormick.</a></h2>
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



<article class="clearfix">
	<?php if ($tabs): ?>
		<div class="tabs">
			<?php print render($tabs); ?>
		</div>
	<?php endif; ?>
	<?php print render($secondary_local_tasks); ?>
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
		<?php print render($page['content']); ?>


<footer>
	<div class="content">
		This site and the stuff on it was made by PJ McCormick. The words are &copy; PJ McCormick, 2010&mdash;<?php print date("Y"); ?>, the design work belongs to the various clients and project owners. Like every other web designer on the face of the earth, you can <a href="http://dribbble.com/mynameispj" title="Dribbble">find him</a> at a <a href="http://www.twitter.com/mynameispj" title="Twitter">number</a> of <a href="http://www.flickr.com/photos/pjmccormick/" title="Flickr">online</a> <a href="http://www.facebook.com/pjmccormick" title="Facebook">hangouts</a>. 
	</div>

</footer>

  
