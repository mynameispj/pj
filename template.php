<?php
// $Id: template.php,v 1.25 2010/11/20 04:03:51 webchick Exp $

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


function pj_field($variables) {
 
  $output = '';
 
  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }
 
  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
 
  if ($variables['element']['#field_name'] == 'field_tags') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  } else {
    // Default rendering taken from theme_field().
    foreach ($variables['items'] as $delta => $item) {
      $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
      $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
    }
  }
  $output .= '</div>';
 
  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';
 
  return $output;
}


function pj_preprocess_node(&$variables) {
  if (isset($variables['content']['body']['#items'])) {
  	$postContent = $variables['content']['body']['#items'][0]['value']; 
  	$word = str_word_count(strip_tags($postContent));
  	$m = floor($word / 200);
  	$s = floor($word % 200 / (200 / 60));
  	$variables['readingEstimate'] = $m . ' minute' . ($m == 1 ? '' : 's') . ', ' . $s . ' second' . ($s == 1 ? '' : 's');
  }

	if ($variables['page']) { 
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

		$nextPost = pn_node($variables['node'], 'n');
		$prevPost = pn_node($variables['node'], 'p');
		
		if ($nextPost != NULL) {
			$buildNextPostHTML = '<div class="group">';
			$buildNextPostHTML .= '	<h3>Next</h3>';
			$buildNextPostHTML .= 	$nextPost;
			$buildNextPostHTML .= '</div>';
			
			$variables['nextPostHTML'] = $buildNextPostHTML; 
			
		} else {
			$variables['nextPostHTML'] = ''; 
		}

		if ($prevPost != NULL) {
			$buildPrevPostHTML = '<div class="group">';
			$buildPrevPostHTML .= '	<h3>Previously</h3>';
			$buildPrevPostHTML .= 	$prevPost;
			$buildPrevPostHTML .= '</div>';
			
			$variables['prevPostHTML'] = $buildPrevPostHTML; 
			
		} else {
			$variables['prevPostHTML'] = ''; 
		}

		//send variables up to node.tpl.php
		$variables['nextPost'] = $nextPost; 	
		$variables['prevPost'] = $prevPost; 
	}	
}
