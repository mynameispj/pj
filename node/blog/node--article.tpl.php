<?php
	hide($content['comments']);
	hide($content['links']);
	hide($content['field_tags']);
?>
  	<article class="content_wrapper post-<?php print $nid;?>"> 
			<header>
  			<div class="row-fluid"> 
  			  <div class="span12"> 
  					<?php print render($title_prefix); ?>
  						<h1<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
  					<?php print render($title_suffix); ?>
    		
  			  </div>
  			  
  			</div>
			</header>
			<div class="content">
        <div class="row-fluid"> 
    			<aside class="span2">
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
          <div class="span10"> 
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
		
