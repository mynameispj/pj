<section class="container" id="main">
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
	<article class="content_wrapper">
	  <header>
    	<div class="row-fluid"> 
    	  <div class="span12"> 
    	    <h1><a>Hey, how's it going?</a></h1>
    	  </div>
    	</div>
	  </header>
	  <div class="content">
    	<div class="row-fluid">
    	  <div class="span6">
    	    <?php print render($page['content']); ?>      
    	  </div>
    
    	  <div class="span6">
      		<?php print render($page['contact_form']); ?>
    	  </div>
    	</div>
	  </div>
	</article>
</section>

<footer>
	<div class="container">
	  <div class="row"> 
	    <div class="span4"> 
	      <?php print render($page['elsewhere']); ?>
	    </div>
	    <div class="span4"> 
	      <?php print render($page['long_road_back']); ?>	    
	    </div>
	    <div class="span4"> 
	      <?php print render($page['reading_list']); ?>
	    </div>
	  </div>
    <div class="row"> 
      <div class="span12"> 
  			<p>This site and the stuff on it was made by PJ McCormick. The words are &copy; PJ McCormick, 2010&mdash;<?php print date("Y"); ?>, the design work belongs to the various clients and project owners.</p>
      </div>
    </div>
	</div>
</footer>
