<div class="span4">
	<a href="<?php print $fields['field_amazonlink']->content; ?> ">
		<img src="<?php print $fields['product_image']->raw; ?>" />
	</a>
	<p>
		<a href="<?php print $fields['field_amazonlink']->content; ?> ">
			<em><?php print $fields['title']->content; ?></em>
			by <?php print $fields['participants_all']->content; ?>
		</a>
	</p>
	<p> 
		<small><?php print $fields['field_book_tag']->content; ?></small>
	</p>
</div>
