<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  print render($content);
?>