<?php
	require "../vendor/facebook/graph-sdk/src/Facebook/autoload.php";
	session_start();
	$fb = new Facebook\Facebook([
	  'app_id'                => '198297070745933',
	  'app_secret'            => 'd3b43710b1965c0ab2be4b54af85f247',
	  'default_graph_version' => 'v2.11',
	]);
?>