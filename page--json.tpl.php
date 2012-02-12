<?php
header("HTTP/1.0 200 OK");
$uri_parts = explode('/', $_SERVER['REQUEST_URI']);
$input = intval($uri_parts[count($uri_parts)-1]);
if(is_int($input) && $input>0){
echo drupal_json_encode(node_load($input));
}
exit();
?>