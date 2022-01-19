<?php 
session_start();
require_once __DIR__ . '/Facebook/autoload.php';

$fb = new \Facebook\Facebook([
  'app_id' => '383783818732892',
  'app_secret' => '9b9c5c026b828d9e832a677d93142038',
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
		 		$param = array(
				   'url' => 'http://cliq.globalsuperelite.com/justpics/IMG_20160724_130311_1_.jpg',
				 	 'access_token' => $item['access_token'],
				 	 'message' => "this is second post in Facebook page"
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
				}

		 	}
		 }
		 
		 
		 
		

} else {

	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/thirdTask-master/picupload.php', $permissions);
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
	