<?php
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY', '3jZD4nqwQKPFc69rZ8pRLA9ZD'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'b4iTgEr5PnH6NHNLqUHxpNY6SnYPUkCvMtQlFFSvTIatpQ29lK'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'https://internship.globalsuperelite.com/group7/twitter/callback.php'); // your app callback URL
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
	$user = $connection->get("account/verify_credentials");
	echo $user->screen_name;
}