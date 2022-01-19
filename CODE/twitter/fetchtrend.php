<?php

session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY','Rny2LyXC6u2zNRt9naGfUMEEn'); // add your app consumer key between single quotes
	define('CONSUMER_SECRET', 'iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9'); // add your app consumer secret key between single quotes
	define('OAUTH_CALLBACK', 'http:/cliq.globalsuperelite.com/twitter/callback.php'); // your app callback URL
	if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo $url;
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	
	
	
	
	
 $woeid = 2424766;
    $url= 'https://api.twitter.com/1.1/trends/place.json?id='.$woeid;
    $trends = $twitter->get($url);
    foreach ($trends[0]->trends as $trend) { 
            $trend->name; 
			echo "<br>";
			echo $trend->name;
}
}
?>