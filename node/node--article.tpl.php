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
  	<article class="post post-<?php print $nid;?>"> 
			<header>
  			<div class="row-fluid"> 
  			  <div class="span12"> 
    				<?php  if ($hideTitle == 0) { ?>
    					<?php print render($title_prefix); ?>
    						<h1<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
    					<?php print render($title_suffix); ?>
    				<?php } else if ($hideTitle == 1) { ?>
    							
    				<?php }?>
    		
  			  </div>
  			  
  			</div>
			</header>
			<div class="post-content">
        <div class="row-fluid"> 
    			<aside class="span3">
    				<dl>
    					<dt>Posted </dt>
    						<dd><?php print format_date($created, 'custom', 'F j Y'); ?></dd>
    				  <?php if (isset($content['field_tags']['#items'])): ?> 
      					<dt>Tagged</dt>
      						<dd><span class="tags"><?php print render($content['field_tags']); ?></span></dd>
    					<?php endif; ?>
    					<dt>Reading Time</dt>
    						<dd><span class="readingTime"><?php echo $readingEstimate; ?></span></dd>
    				</dl>				
    			</aside>
          <div class="span9"> 
      			<div class="firstParagraph"><?php print $firstParagraph; ?></div>    	
      			<?php print render($content); ?>
          </div>
    		</div>
			</div>
      <?php if ($page) { ?>
        <div class="post-nav well well-small">
          <div class="row-fluid"> 
            <div class="span6 next"> 
              <?php print $nextPostHTML; ?>
            </div>
            <div class="span6"> 
              <?php print $prevPostHTML; ?>
            </div>
          
          </div>
        </div>
      <?php } ?> 				
			
  		<?php print render($content['comments']); ?>
  	</article>
		
