<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<article class="clearfix" id="blogRoll">
	<div class="articleWrap">
		<article class="post">
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <header>
      <?php print $header; ?>
    </header>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>
	</article>
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