<?php

require '/home/globappq/public_html/cliq/twitter/autoload.php';
            use Abraham\TwitterOAuth\TwitterOAuth;
//require_once 'lib/twitteroauth.php';
 include 'twitter-api-php-master/TwitterAPIExchange.php';
/*define('CONSUMER_KEY', 'Rny2LyXC6u2zNRt9naGfUMEEn');
define('CONSUMER_SECRET', 'iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9');
define('ACCESS_TOKEN', '878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY');
define('ACCESS_TOKEN_SECRET', 'lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK');
 
 $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
 /*
$query = array(
  "q" => "#Missworld"
);
 
$results = $toa->get('search/tweets', $query);
 
foreach ($results->statuses as $result) {
  echo $result->user->screen_name . ": " . $result->text . "\n<br>" . $result->url . "\n<br><br><br>";
}  */

$settings = array(
    'oauth_access_token' => "878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY",
    'oauth_access_token_secret' => "lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK",
    'consumer_key' => "Rny2LyXC6u2zNRt9naGfUMEEn",
    'consumer_secret' => "iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9"
);



$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=#nerd';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
/* echo "<pre>";
print_r(json_decode($response));
echo "</pre>";
 */
/* foreach($response as $tweet)
{
	foreach($tweet as $t){
		echo '<img src="'.$t->user->profile_image_url.'"/>'.$t->text.'<br>.' ;
	}
	
} 
 */
 
 $out= json_decode($response);
 foreach($out as $tweet)
{
	foreach($tweet as $t){
		echo '<img src="'.$t->user->profile_image_url.'"/>'.$t->text.'<br>.' ;
	}
	
} 
 ?>