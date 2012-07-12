<?php
// $Id: node.tpl.php,v 1.34 2010/12/01 00:18:15 webchick Exp $

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>

<?php
	// We hide the comments and links now so that we can render them later.
	hide($content['comments']);
	hide($content['links']);
	hide($content['field_tags']);
	hide($content['field_image']);
	hide($content['field_article_first_paragraph']);
	hide($content['field_background_image']); 
  
	if (array_key_exists('#items', $content['field_background_image'])) {
		$fillImageExists = 1; 
	} else {
		$fillImageExists = 0; 		
	}
  
	$nextPost = pn_node($node, 'n'); 	
	$prevPost = pn_node($node, 'p'); 	
  
?>

<div class="articleWrap post-<?php print $nid; if ($fillImageExists == 1) print ' fillpost';  ?>">   
	<?php 
	//krumo($content['field_background_image']); 
	if ($fillImageExists == 1) {
		print '<div class="fill">' . render($content['field_background_image']) . '</div>'; 
	} ?> 
	
	<article class="post post-<?php print $nid;?>"> 
		<header>
			<?php if ($nid != 24): //the title of the testicular cancer post is in the body of the post ?>
				<?php print render($title_prefix); ?>
					<h1<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
				<?php print render($title_suffix); ?>
			<?php endif; ?>
	
		</header>
		<aside>
			<?php if ($nid != 24): //the date of the TC post is in the body of the post ?>
				<?php print format_date($created, 'custom', 'F j Y'); ?>
				<span class="tags"><?php print render($content['field_tags']); ?></span>
			<?php endif; ?>
			
		</aside>
	
		<div class="firstParagraph"><?php print render($content['field_article_first_paragraph']['#items'][0]['value']); ?></div>
		<?php print render($content); ?>
	
	</article>
	<?php if ($page) { ?>
		<div class="pager">
			<?php if ($nextPost != NULL) { ?>
				<div class="next">
					<div class="label">&larr; Next</div>
					<?php print $nextPost; ?>
				</div>
			<?php } ?>
			<?php if ($prevPost != NULL) { ?>
				<div class="prev">
					<div class="label">Previously &rarr; </div>
					<?php print $prevPost; ?>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</div>
