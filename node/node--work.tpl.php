<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_work_images']);
  hide($content['field_work_preview']);
  hide($content['field_work_blurb']);
  hide($content['field_work_blurb']);
  hide($content['field_work_type']);
  hide($content['field_work_lead_paragraph']);
  hide($content['field_work_other_images']);
  hide($content['field_images_other_images']);
  hide($content['field_work_other_images_upload']); 
  hide($content['field_work_link']);
  hide($content['field_lead_image_flickr']);
  hide($content['field_other_images_flickr']);
  hide($content['field_deliverables']);
  hide($content['body']);
  //print render($content);
  //krumo($content); 
?>
<?php if ($page): ?> 
  <article class="work work-<?php print $nid;?>"> 
  	<header>
  		<div class="row-fluid"> 
  		  <div class="span12"> 
    			<?php print render($title_prefix); ?>
    				<h1<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
    			<?php print render($title_suffix); ?>
  		
  		  </div>
  		  
  		</div>
  	</header>
  	<div class="post-content">
      <div class="row-fluid"> 
  			<aside class="span8">
  			  <?php print render($content['field_lead_image_flickr']['#items'][0]['value']); ?>
  			  <?php print render($content['field_other_images_flickr']['#items'][0]['value']); ?>
  			</aside>

        <div class="span4">
          <?php if (isset($content['field_deliverables']['#items'])): ?> 
            <div class="well well-small"> 
              <?php print render($content['field_deliverables']); ?>
            </div> 
          <?php endif; ?> 
          <?php print render($content['body']); ?> 
        </div>
  		</div>
  	</div>
  
  </article>
<?php endif; ?> 
