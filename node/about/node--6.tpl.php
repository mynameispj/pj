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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="content"<?php print $content_attributes; ?>>
    <div class="row-fluid">
      <div class="span8"> 
        <a href="http://www.flickr.com/photos/caleuanhopkins/9527000477/" title="IMG_0084 by CalEuanHopkins, on Flickr"><img src="http://farm3.staticflickr.com/2862/9527000477_65d32d42a1_b.jpg" width="800" height="533" alt="IMG_0084"></a>
        <p><small>Speaking at <a href="http://hybridconf.net/">HybridConf</a> 2013. Photo by <a href="http://www.flickr.com/photos/caleuanhopkins/">Callum Hopkins</a> on Flickr.</small></p>
      </div>
      <div class="span4">
        <?php
          // We hide the comments and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          print render($content);
        ?>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12"> 
        <h3>Some of the things that help me do stuff</h3>
        <p>Without these things, I'd probably never accomplish anything:</p>      
        <div class="row-fluid"> 
          <div class="span3"> 
            <ul> 
              <li>My amazing and inspiring wife</li>
              <li>My incredible team</li>
              <li>Evernote</li>
              <li>Drafts</li>
              <li>Coda 2</li>
              <li>iTerm</li>
            </ul>
          </div>
          
          <div class="span3"> 
            <ul>
              <li>Whiteboards & dry-erase markers</li>
              <li>Sticky notes</li>
              <li>Index cards</li>
              <li>Pens</li>
              <li>Scrap paper</li>
            </ul>
          </div>
    
          <div class="span3">
            <ul>
              <li>SASS</li>
              <li>Compass</li>
              <li>Ruby on Rails</li>
              <li>Git</li>
              <li>Drupal</li>
              <li>WordPress</li>
            </ul>
          </div>
          
          <div class="span3">
            <ul>
              <li>Github</li>
              <li>Bitbucket</li>
              <li>SourceTree</li>
              <li>Stack Overflow</li>              
              <li>Flickr</li>
              <li>Adobe Fireworks (RIP)</li>   
              <li>Transmit</li>
                         
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12"> 
        <h3>About this site</h3>
        <p>I built this site in Coda 2, using SASS, Compass, and Twitter Bootstrap by way of dude's awesome Bootstrap SASS Gem.</p>
        <p>Yeah, I know, Bootstrap's terrible because of crufty markup and blah blah blah. I used it because helped me quickly get to a powerful, extensible, and highly-flexible design. I may not reach for it in every project, but on this one it was immensely valuable because it helped me extinguish a lot of internal friction I'd built up around working on, updating, and refining this site.</p>
        <p>This site runs on Drupal 7&mdash;you can actually check out the theme's source code on my Github account if you're into that kind of thing.</p>
      </div>
    </div>
  </div>

</div>