<?php
	// We hide the comments and links now so that we can render them later.
	hide($content['comments']);
	hide($content['links']);
	hide($content['field_tags']);
	hide($content['field_image']);
	hide($content['field_article_first_paragraph']);
	hide($content['field_background_image']); 
	hide($content['field_custom_layout']); 
	hide($content['field_hide_title']); 
	hide($content['field_linked_article']); 	
?>

<div class="articleWrap post-<?php print $nid; print $fillImageExists; print $customLayout; ?>">   
	<?php print $bgimage; ?>
	
	<article class="post post-<?php print $nid;?>"> 
		<div class="content">
			<header>
				<?php  if ($hideTitle == 0) { ?>
					<?php print render($title_prefix); ?>
						<h1<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
					<?php print render($title_suffix); ?>
				<?php } else if ($hideTitle == 1) { ?>
							
				<?php }?>
		
			</header>
			<aside>
				<dl>
					<dt>Posted </dt>
						<dd><?php print format_date($created, 'custom', 'F j Y'); ?></dd>
					<dt>Tagged</dt>
						<dd><span class="tags"><?php print render($content['field_tags']); ?></span></dd>
					<dt>Reading Time</dt>
						<dd><span class="readingTime"><?php echo $readingEstimate; ?></span></dd>
				</dl>				
			</aside>
		
			<div class="firstParagraph"><?php print $firstParagraph; ?></div>
	
			<?php print render($content); ?>
		</div>
		
		<?php 
		//Google AdSense ad
		if ($page) { ?>
			<!--<div class="ad postfooter">
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-2106906807001894";
					/* Post Footer Ads */
					google_ad_slot = "1277597508";
					google_ad_width = 468;
					google_ad_height = 60;
					//-->
				<!--</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			</div>-->
		<?php } ?>
		
		<?php print render($content['comments']); ?>
		
	</article>

</div>
<?php if ($page) { ?>
	<section class="sidebar">
		<?php print $nextPostHTML; ?>
		<?php print $prevPostHTML; ?>
<?php } ?>