<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <<?php print $group_element; ?><?php print drupal_attributes($group_attributes); ?>>
    <?php print $title; ?>
  </<?php print $group_element; ?>>
<?php endif; ?>
<?php if (!empty($list_element)): ?>
  <<?php print $list_element; ?><?php print drupal_attributes($list_attributes); ?>>
<?php endif; ?>

<?php $counter = 0; ?>

<div class="row-fluid">

	<?php foreach ($rows as $id => $row): ?>
	
	  <?php if (!empty($row_element)): ?>
	  <<?php print $row_element; ?><?php print drupal_attributes($row_attributes[$id]); ?>>
	  <?php endif; ?>
	    <?php print $row; ?>
	  <?php if (!empty($row_element)): ?>
	  </<?php print $row_element; ?>>
	  <?php endif; ?>
	  
		<?php if(++$counter % 3 === 0) {
			echo '</div><div class="row-fluid">'; 
		};?>
	
	<?php endforeach; ?>
</div>

<?php if (!empty($list_element)): ?>
  </<?php print $list_element; ?>>
<?php endif; ?>