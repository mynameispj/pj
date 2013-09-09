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
  	<title>PJ McCormick | Designer, developer, cancer patient/survivor, writer, and, y'know, other stuff.</title>
  <?php } else { ?>	
  	<title><?php print $head_title; ?></title>
  <?php } ?>	  
  <?php if ($is_front): ?>
	  <meta name="description" content="I'm PJ McCormick, UX Designer, web developer, writer, Pixar lover, cancer hater. And other stuff." />
  <?php endif ;?>
  <?php print $styles; ?>
  <?php print $scripts; ?>

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
  <script type="text/javascript" src="//use.typekit.net/fwa2ojb.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<meta name="readability-verification" content="RXcZffYXSqCSyFZTgvtpv3ugzCN9npsQndVBMLjm"/>	
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
	<div id="skip-link">
		<a href="#main" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
	</div>
	
	<header id="page" class="clearfix">
		<h2>
		  <a href="/" class="brand">PJ McCormick</a>
		  UX Design Lead<span class="hidden-phone"> at Amazon</span>,<span class="hidden-phone"> Designer/Developer Hybrid,</span> Speaker, Cancer Survivor
	  </h2>
	  <div class="navbar">
	  	<div class="navbar-inner">
	  	
	      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <div class="nav-collapse collapse">
	
	        <nav> 
	          <ul> 
	            <li><a href="/" class="blog">Blog</a></i></li>
	            <li><a href="/work" class="work">Work</a></li>
	            <li><a href="/reading" class="reading">Reading</a></li>
	            <li><a href="/about" class="about">About</a></li>
	            <li><a href="/contact" class="contact">Contact</a></li>
	          </ul>
	        </nav>
	      </div> 
	    </div> 
	</header>
	
	<?php print $page_top; ?>
	<?php print $page; ?>
	<?php print $page_bottom; ?>
</body>
</html>