<?php if ($header): ?>
	<div class="row-fluid">
		<div class="span12">
			<header class="books">
			  <h1><?php print $header; ?></h1>
			  <a href="/reading">See all books</a>
			</header>
		</div>
	</div>
<?php endif; ?>

<div class="row-fluid">
	<?php if ($exposed): ?>
		<div class="view-filters">
			<?php print $exposed; ?>
		</div>
	<?php endif; ?>
	<div class="span9">

		<?php print $rows; ?>
	</div>
	<div class="span3">
		<?php print views_embed_view('book_tags','block_1'); ?>	
	</div>
</div>