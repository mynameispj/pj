<?php
// $Id: html.tpl.php,v 1.6 2010/11/24 03:30:59 webchick Exp $

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?>

<!DOCTYPE html>

<html lang="en" class="no-js" <?php print $rdf_namespaces; ?>>
<!-- the "no-js" class is for Modernizr. -->

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <?php if ($is_front) { ?>
  	<title>PJ McCormick | Design, development, cancer, and, y'know, other stuff.</title>
  <?php } else { ?>	
  	<title><?php print $head_title; ?></title>
  <?php } ?>	  
  <?php if ($is_front): ?>
	  <meta name="description" content="I'm PJ McCormick, UX Designer, web developer, writer, Pixar lover, cancer hater. And other stuff." />
  <?php endif ;?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
    
	<!--[if IE]>
		<?php print pj_get_ie_styles(); ?>
	<![endif]-->
	<!--[if IE 7]>
		<?php print pj_get_ieseven_styles(); ?>
	<![endif]-->
	<!--[if IE 8]>
		<?php print pj_get_ieseven_styles(); ?>
	<![endif]-->


	<script type="text/javascript">
	
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-31428765-1']);
		_gaq.push(['_setDomainName', 'pjmccormick.com']);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	
	</script>
	
	<meta name="google-site-verification" content="CaJrlEs8DAKp19J2n7pD_Qd9Gs-KFJCrAZstoGVa7Qc" />
	<meta name="google-site-verification" content="CaJrlEs8DAKp19J2n7pD_Qd9Gs-KFJCrAZstoGVa7Qc" />
	<meta name="y_key" content="664ea37a19465f6d" />
	<meta name="msvalidate.01" content="245E420BBF46223DB09CDC8499509EEA" />
	
	<!--Typekit-->
	<script type="text/javascript" src="http://use.typekit.com/fwa2ojb.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<meta name="readability-verification" content="RXcZffYXSqCSyFZTgvtpv3ugzCN9npsQndVBMLjm"/>
	
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
	<div id="skip-link">
		<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
	</div>
	<?php print $page_top; ?>
	<?php print $page; ?>
	<?php print $page_bottom; ?>
	<footer>
		<div class="content">
			This site and the stuff on it was made by PJ McCormick. The words are &copy; PJ McCormick, 2010&mdash;<?php print date("Y"); ?>, the design work belongs to the various clients and project owners. Like every other web designer on the face of the earth, you can <a href="http://dribbble.com/mynameispj" title="Dribbble">find him</a> at a <a href="http://www.twitter.com/mynameispj" title="Twitter">number</a> of <a href="http://www.flickr.com/photos/pjmccormick/" title="Flickr">online</a> <a href="http://www.facebook.com/pjmccormick" title="Facebook">hangouts</a>.  
		</div>
	</footer>
</body>
</html>