<article class="content_wrapper">
  <?php if ($header): ?>
    <header>
    	<div class="row-fluid">
    		<div class="span12">
    			<header class="books">
    			  <h1><a><?php print $header; ?></a></h1>
    			</header>
    		</div>
    	</div>
    </header>
  <?php endif; ?>
  <div class="content">
    <div class="row-fluid">
    	<?php if ($exposed): ?>
    		<div class="view-filters">
    			<?php print $exposed; ?>
    		</div>
    	<?php endif; ?>
    	<div class="span3 book-genre">
    	  <h4>Browse by Genre</h4>
    		<?php print views_embed_view('book_tags','block_1'); ?>	
			  <p><a href="/reading">&larr; See all books</a></p>
    	</div>
    	
    	<div class="span9">
    		<?php print $rows; ?>
    	</div>
    </div>
  </div>
</div>