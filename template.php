<?php
// $Id: template.php,v 1.25 2010/11/20 04:03:51 webchick Exp $


function pj_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/css/_patches/win-ie-all.css" />';

  return $iecss;
}

function pj_get_ieseven_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/css/_patches/win-ie7.css" />';

  return $iecss;
}


function pj_links($variables) {
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';

    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading. 
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;


    foreach ($links as $key => $link) {
      $class = array($key);
      $class[] = strtolower(str_replace(" ", "", $link['title']));
      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
           && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      
      
      $output .= '<li' . drupal_attributes(array('class' => $class)) . ' >';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}






function pj_preprocess_page(&$variables, $hook) {

    // When this goes through the theme.inc some where it changes _ to - so the tpl name is actually page--type-typename.tpl
    if (isset($variables['node'])) {
        $variables['theme_hook_suggestions'][] = 'page__type__'. str_replace('_', '--', $variables['node']->type); 
        
    } 
       
}







function pj_image($variables) {
  $attributes = $variables['attributes'];
  $attributes['src'] = file_create_url($variables['path']);

  foreach (array('alt', 'title') as $key) {

    if (isset($variables[$key])) {
      $attributes[$key] = $variables[$key];
    }
  }

  return '<img' . drupal_attributes($attributes) . ' />';
}

function pn_node($node, $mode = 'n') {
	if (!function_exists('prev_next_nid')) {
		return NULL;
	}

	switch($mode) {
		case 'p':
			$n_nid = prev_next_nid($node->nid, 'prev');
			$link_text = 'previous';
		break;
		
		case 'n':
			$n_nid = prev_next_nid($node->nid, 'next');
			$link_text = 'next';
		break;
		
		default:
		return NULL;
	}

	if ($n_nid) {
		$n_node = node_load($n_nid);
		
		switch($n_node->type) {	
			case 'article': 
				$html = l('"'.$n_node->title .'"', 'node/'.$n_node->nid); 
			return $html; 
		}
	}
}
