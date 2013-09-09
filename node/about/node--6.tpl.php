<article id="node-<?php print $node->nid; ?>" class="content_wrapper <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<header> 
  	<div class="row-fluid">
  		<h1><a><?php print $title; ?></a></h1>
  	</div>
	</header>
	<div class="content">
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
  ?>
</article>