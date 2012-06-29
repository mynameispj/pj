<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

$nid = $fields['nid']->raw; 
$title = $fields['title']->content; 
$date = $fields['created']->content; 
$tags = $fields['term_node_tid']->content;
$firstParagraph = $fields['field_article_first_paragraph']->content;
$post = $fields['body']->content; 

?>

<article class="post-<?php print $nid;?>"> 
	<header>
		<?php //krumo($fields); ?>
		<?php if ($nid != 24): //the title of the testicular cancer post is in the body of the post ?>
			<h2><?php print $title; ?></h2>
		<?php endif; ?>
	</header>
	<aside>
		<?php if ($nid != 24): //the date of the TC post is in the body of the post ?>
			<?php print $date;?>
			<?php print $tags; ?>
		<?php endif; ?>
		
	</aside>

	<?php print $firstParagraph;?>
	<?php print $post; ?>

</article>
