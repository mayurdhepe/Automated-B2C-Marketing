<?php

//$name = $_POST['myimage'];
session_start();
require_once __DIR__ . '/Facebook/autoload.php';



//########################################################################################
$fb = new \Facebook\Facebook([
  'app_id' => '383783818732892',
  'app_secret' => '9b9c5c026b828d9e832a677d93142038',
  'redirectURL' => 'http://cliq.globalsuperelite.com/thirdTask-master/mphoto.php',
  'default_graph_version' => 'v2.11',
]);

   $permissions = []; // optional
   $helper = $fb->getRedirectLoginHelper();
   $accessToken = $helper->getAccessToken();

if (isset($accessToken)) {

$url = "https://graph.facebook.com/v2.11/me/accounts?access_token={$accessToken}";
		$headers = array("Content-type: application/json");
		
			 
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $url);
	         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		   
		 $st=curl_exec($ch); 
		 $result=json_decode($st,TRUE);
		 foreach ($result['data'] as $item) {
		 	if ($item['id'] == '879858028854213'){
		 		//
		 		/*$param = array(
				   'url' => 'https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/19399068_10154494131796175_1757843916221769837_n.jpg?oh=ef8e1f2ba31bde9ff3ce6f3ac5dbbf07&oe=59DEC06A',
				 	 'access_token' => $item['access_token'],
				 	 'message' => "My new post on fb."
				);*/

				$myurl="http://cliq.globalsuperelite.com/justpics/draw2-1.jpg";
				//echo $name;
				$param = array(
				   'url' => $myurl,
				 	 'access_token' => $item['access_token'],
				 	 'message' => "My new post on fb."
				);


				$ch = curl_init();
				$url = "https://graph.facebook.com/879858028854213/photos";
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
				$response = curl_exec($ch);
				$err = curl_error($ch);
				curl_close($ch);
				if ($err) {
				 echo "this is error".$err;
				} else {
				 echo $response;
				echo '<br>';
				echo substr($response,7,15);					

				}

		 	}
		 }
}

 else {

	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/thirdTask-master/mphoto.php', $permissions);
	echo "<head><style>
			.center {
			    text-align: center;
			    border: 3px solid green;
				position: absolute;
				top: 50%;
				left: 50%;
				margin: -150px 0 0 -150px;
				width:350px;
				height:380px;
				}
			</style></head>
			<div class='center'>
			<br><br><br><br>";
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
	echo '</div>';
}
	?>
