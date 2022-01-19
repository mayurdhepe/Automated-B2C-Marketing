<pre>
<?php
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY','Rny2LyXC6u2zNRt9naGfUMEEn'); // add your app consumer key between single quotes
	define('CONSUMER_SECRET', 'iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9'); // add your app consumer secret key between single quotes
	define('OAUTH_CALLBACK', 'http://internship.globalsuperelite.com/group7/twitter/callback.php'); // your app callback URL
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
	
	// getting basic user info
	$user = $connection->get("account/verify_credentials");
	
	// printing username on screen
	//echo $user->screen_name;
	// posting tweet on user profile
	$tweetWM = $connection->upload('media/upload', ['media' => "artist.jpg"]);
	//echo $name1;
	// tweeting with uploaded media (image) using media_id
	$tweet = $connection->post('statuses/update', ['media_ids' => $tweetWM->media_id, 'status' => "hello nm"]);
	//print_r($tweet);

	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	fwrite($myfile, print_r($tweet,true));
	fclose($myfile);

		$handle = fopen("newfile.txt", "r") or die("Unable to open file!");
		if ($handle) {
		while (($line = fgets($handle)) !== false) {
        // process the line read.
		$has_match = preg_match("~id~",$line,$matches_out) ;
		if($has_match)
			break;
		}
		echo substr($line,11,18);
	}
    
    fclose($handle);

}
?>
</pre>