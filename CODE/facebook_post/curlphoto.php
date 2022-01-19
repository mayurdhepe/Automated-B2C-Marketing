<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

$fb = new \Facebook\Facebook([
  'app_id' => '198297070745933',
  'app_secret' => 'd3b43710b1965c0ab2be4b54af85f247',
  'default_graph_version' => 'v2.11',
]);

   $permissions = []; // optional
   $helper = $fb->getRedirectLoginHelper();
  
  // $accessToken="EAACEdEose0cBALC2kgTKXobBefEyWhdMp2MdV6gWlYVeiBs2ZAWeT6ZBGL6dIIN9JuW5pxbb187629WE679uZCJfZCrygRthYHtNH3WaXeJWR8NsAbc6f2qpwq9cgKGGSVZAEot4kHG52m51R8ZAbGxjwZBTTt7LZAP6rCQohEzoqzmafycUdMv1QgLcApogoJZAKhMqoz73QLQZDZD";
   $access_token = $helper->getAccessToken();
if (isset($access_token)) {



$graph_url = "https://graph.facebook.com/879858028854213/photos?access_token=" . $access_token;
$post_url = "https://graph.facebook.com/879858028854213/photos";
$ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, $post_url );

$post_array = array(
        //"source" =>$fb->fileToUpload('/home/globappq/public_html/cliq/justpics/draw2.jpg'),
        "message"=>"Upload " 
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array); 
    $response = curl_exec($ch);
}
else {

	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/curlphoto.php', $permissions);
echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
	?>