<article class="clearfix" id="blogRoll">
	<div class="articleWrap">
		<article class="post">
			<header>
			      <?php print $header; ?>
			</header>
			<?php if ($exposed): ?>
				<div class="view-filters">
					<?php print $exposed; ?>
				</div>
			<?php endif; ?>
			<?php print $rows; ?>
		</article>
	</div>
</div>

</div><?php /* class view */ ?>

