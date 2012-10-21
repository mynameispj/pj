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
	<?php print render($page['content']); ?>
	<section class="sidebar">
		<div class="group">
			<h3>Elsewhere</h3>
			<ul>
				<li><a href="http://www.twitter.com/mynameispj" title="Twitter">Twitter</a></li>
				<li><a href="http://dribbble.com/mynameispj" title="Dribbble">Dribbble</a></li>
				<li><a href="https://github.com/mynameispj">Github</a></li>
				<li><a href="http://www.flickr.com/photos/pjmccormick/" title="Flickr">Flickr</a></li>
				<li><a href="http://www.quora.com/PJ-McCormick" title="PJ on Quora">Quora</a></li>
				<li><a href="http://workforpie.com/mynameispj/biography/">Work For Pie</a></li>
				<li><a href="http://www.facebook.com/pjmccormick" title="Facebook">Facebook</a></li>
			</ul>
		</div>
		<div class="group">
			<h3>Currently Reading:</h3>
			<?php print views_embed_view('books','block'); ?>
		</div>
		
		<div class="group">
			<h3>Long Road Back</h3>
			<a href="http://www.amazon.com/gp/product/B008OUVF7K/ref=as_li_ss_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=B008OUVF7K&linkCode=as2&tag=mnip-20" onClick="_gaq.push(['_trackEvent', 'LongRoadBackPromos', 'SidebarImage']);"><img alt="Long Road Back: A Brief Tale of Loss" src="/<?php print path_to_theme(); ?>/images/lrb.png"  /></a>
			<p><a href="http://www.amazon.com/gp/product/B008OUVF7K/ref=as_li_ss_tl?ie=UTF8&camp=1789&creative=390957&creativeASIN=B008OUVF7K&linkCode=as2&tag=mnip-20" onClick="_gaq.push(['_trackEvent', 'LongRoadBackPromos', 'SidebarLink']);">A brief tale of loss. $0.99 on Amazon.</a></p>
		</div>
		<div class="group">
			<h3>Blog Tags</h3>
			<?php print views_embed_view('blog_post_tags','block'); ?>
		</div>

	</section> <?php //closes <section> opened in node--article.tpl.php ?>
	<a class="showSidebar"><div class="arrow-left"></div></a>

</article>	
	