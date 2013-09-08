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
  hide($content['field_preview_image_flickr']);
  hide($content['field_deliverables']);
  hide($content['body']);
  //print render($content);
  //krumo($content); 
?>
<?php if ($page) { ?> 
  <article class="content_wrapper work-<?php print $nid;?>"> 
  	<header>
  		<div class="row-fluid"> 
  		  <div class="span12"> 
    			<?php print render($title_prefix); ?>
    				<h1<?php print $title_attributes; ?>><a><?php print $title; ?></a></h1>
    			<?php print render($title_suffix); ?>
  		
  		  </div>
  		  
  		</div>
  	</header>
  	<div class="content">
      <div class="row-fluid"> 
        
  			<aside class="span2">
          <?php if (isset($content['field_deliverables']['#items'])): ?> 
            <dl> 
              <dt>Deliverables</dt>
                <dd><?php print render($content['field_deliverables']); ?></dd>
            </dl> 
            
            <p></i><a href="/work">&larr; Back to Work</a></p>
          <?php endif; ?> 
  			</aside>
        <div class="span10">
   			  <?php print render($content['field_lead_image_flickr']); ?>
          <?php print render($content['body']); ?> 
        </div>
  		</div>
  	</div>
  
  </article>
<?php } else { ?>
  <a class="work_thumb" href="<?php print $node_url; ?>" style="background: transparent url(<?php print render($content['field_preview_image_flickr']['#items'][0]['value']); ?>) no-repeat">
    <div class="vignette">
      <span class="title"><?php print $node->title ?></span>
    </div>
  </a>
<?php } ?> 
