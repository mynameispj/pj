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

	
	$firstParagraph = render($content['field_article_first_paragraph']['#items'][0]['value']); 	
	
	
	if (array_key_exists('#items', $content['field_background_image'])) { 
		$fillImageExists = 1; 
	} else {
		$fillImageExists = 0; 		
	} 

	if (array_key_exists('#items', $content['field_custom_layout'])) { 
		$customLayout = 1;  
	} else {
		$customLayout = 0;  		
	} 

	if (array_key_exists('#items', $content['field_hide_title'])) { 
		$hideTitle = render($content['field_hide_title']['#items'][0]['value']);  
	} else {
		$hideTitle = 0;  		
	} 


	if ($page) { 
		$nextPost = pn_node($node, 'n'); 	
		$prevPost = pn_node($node, 'p'); 
	}	
	
	//Post reading time estimate--props: http://briancray.com/posts/estimated-reading-time-web-design/
	$postContent = $firstParagraph . render($content); 
	$word = str_word_count(strip_tags($postContent));
	$m = floor($word / 200);
	$s = floor($word % 200 / (200 / 60));
	$est = $m . ' minute' . ($m == 1 ? '' : 's') . ', ' . $s . ' second' . ($s == 1 ? '' : 's');
	
?>

<div class="articleWrap post-<?php print $nid; if ($fillImageExists == 1) print ' fillpost';
if ($customLayout == 1) print ' '. $content['field_custom_layout']['#items'][0]['value'];  ?>">   
	<?php 
	//krumo($content['field_background_image']); 
	if ($fillImageExists == 1) {
		print '<div class="fill">' . render($content['field_background_image']) . '</div>'; 
	} ?> 
	
	<article class="post post-<?php print $nid;?>"> 
		<div class="content">
			<header>
				<?php  if ($hideTitle == 0) { ?>
					<?php print render($title_prefix); ?>
						<h1<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
					<?php print render($title_suffix); ?>
				<?php } else if (($hideTitle == 1) || ($nid != 24)) { ?>
							
				<?php }?>
		
			</header>
			<aside>
				<?php  if ($hideTitle == 0) { //the title of the testicular cancer post is in the body of the post ?>
					<dl>
						<dt>Posted</dt>
							<dd><?php print format_date($created, 'custom', 'F j Y'); ?></dd>
						<dt>Tagged</dt>
							<dd><span class="tags"><?php print render($content['field_tags']); ?></span></dd>
						<dt>Reading Time</dt>
							<dd><span class="readingTime"><?php echo $est; ?></span></dd>
					</dl>
				<?php } else if (($hideTitle == 1) || ($nid != 24)) { ?>
							
				<?php }?>
				
			</aside>
		
			<div class="firstParagraph"><?php print $firstParagraph; ?></div>
	
			<?php 
			//krumo(render($content)); 
			print render($content); ?>
		</div>
	</article>

</div>
<section class="sidebar">
	<?php if ($page) { ?>
		<?php if ($nextPost != NULL) { ?>
			<div class="group">
				<h3>Next</h3>
				<?php print $nextPost; ?>
			</div>
		<?php } ?>
		<?php if ($prevPost != NULL) { ?>
			<div class="group">
				<h3>Previously</h3>
				<?php print $prevPost; ?>
			</div>
		<?php } ?>
	<?php } ?>