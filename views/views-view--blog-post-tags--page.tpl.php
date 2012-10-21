<article class="clearfix" id="blogRoll">
	<div class="articleWrap">
		<article class="post">
			<header>
			      <?php print $header; ?>
			</header>
			<?php print $rows; ?>
		</article>
	</div>
</div>

</div><?php /* class view */ ?>
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
	</section>

</article>