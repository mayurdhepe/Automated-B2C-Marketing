<?php
session_start();

//require_once __DIR__ . '/vendor/autoload.php';
//$id=$_POST['fb'];
/* 
$dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_cliq';
        $dbPassword = 'cliquser123';
        $dbName     = 'globappq_cliq';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);

	 
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
	
	
	$maxid1="SELECT * from media where id='$id'";
				if ($result = $db->query($maxid1)) {    
     while ($row = $result->fetch_object()) 
	 {
        $mediaurl = $row->media_url;
	$text= $row->text;
	}
	}
	echo "$mediaurl"; */
	
	
	
require_once __DIR__ . '/vendor/autoload.php'; // download official fb sdk for php @ https://github.com/facebook/php-graph-sdk
$fb = new Facebook\Facebook([
  'app_id' => '198297070745933',
  'app_secret' => 'd3b43710b1965c0ab2be4b54af85f247',
  'default_graph_version' => 'v2.11',
]);
$helper = $fb->getCanvasHelper();
$permissions = ['email', 'publish_actions']; // optional
try {
	if (isset($_SESSION['facebook_access_token'])) {
	$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		$_SESSION['facebook_access_token'] = (string) $accessToken;
	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	
	// validating the access token
	try {
		$request = $fb->get('/me');
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		if ($e->getCode() == 190) {
			unset($_SESSION['facebook_access_token']);
			$helper = $fb->getRedirectLoginHelper();
			$loginUrl = $helper->getLoginUrl('https://apps.facebook.com/APP_NAMESPACE/', $permissions);
			echo "<script>window.top.location.href='".$loginUrl."'</script>";
			exit;
		}
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	try {
		// message must come from the user-end
		//$source = $fb->fileToUpload(__DIR__.'/draw2.jpg');
		//$message = 'my photo';
		
		$request = $fb->post('/me/photos', 
                                array(
                                    'picture' => 'http://cliq.globalsuperelite.com/justpics/draw2-2.jpg',
                                    'message' =>'HII',
									'link' => 'http://cliq.globalsuperelite.com/facebook_post/index.php'
									
                                    ));							
		$response = $request->getGraphNode()->asArray();

	//#####################################################################################################	
		/* $id = "879858028854213";
		//$request = $fb->get('/879858028854213');
		$request= $fb->get('/me/accounts', $_SESSION['token']);
		$request = $request->getDecodedBody();
		

		foreach($request['data'] as $page){
            if($page['id'] == $id){
                $accesstoken = $page['access_token'];
                break;
            }
        }
	 
	// message must come from the user-end
		//$source = $fb->fileToUpload(__DIR__.'/draw2.jpg');
		//$message = 'my photo';
		
		$data = array(
		'picture' => "http://cliq.globalsuperelite.com/justpics/draw2-2.jpg",
                'message' => "Hii!!",
		'link' => "http://cliq.globalsuperelite.com/facebook_post/index.php"
                
        );

		$request = $fb->post($id . '/feed/', $data, $accesstoken);


						
		$response = $request->getGraphNode()->asArray();
	
	echo $response['id'];
 */
	//#########################################################################################################3
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	echo $response['id'];
  	// Now you can redirect to another page and use the
  	// access token from $_SESSION['facebook_access_token']
} else {
	$helper = $fb->getRedirectLoginHelper();
	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/index.php', $permissions);
	echo "<script>window.top.location.href='".$loginUrl."'</script>";
}
