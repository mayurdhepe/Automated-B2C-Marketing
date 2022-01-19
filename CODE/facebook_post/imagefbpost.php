<?php
session_start();


//$description = $_POST[''];
//$image = $_POST[''];
//DB details
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

	//Insert image content into database
        
	
require_once __DIR__ . '/vendor/autoload.php'; // download official fb sdk for php @ https://github.com/facebook/php-graph-sdk
define("UPLOAD_DIR", "/home/globappq/public_html/cliq/justpics/");

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
			$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/index.php', $permissions);
			echo "<script>window.top.location.href='".$loginUrl."'</script>";
			exit;
		}
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

$id = "879858028854213";
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
		
		$maxid1="SELECT id from fbimg where id=(SELECT MAX(id) FROM fbimg)";
				if ($result = $db->query($maxid1)) {    
     while ($row = $result->fetch_object()) 
	 {
        $maxid = $row->id;
	}
	}
	//echo $maxid;
	$x=$maxid;	
        //echo "The value of x is ".$x."   ";
			$getinfo = "SELECT * FROM fbimg WHERE id=$x";
			if ($result = $db->query($getinfo)) {    
     while ($row = $result->fetch_object()) 
	 {
        $newname = $row->name;
		$message = $row->description;
	}
	}		
		 /*  $data = array(
		'source' => "http://cliq.globalsuperelite.com/justpics/$newname",
		        'message' => "$message",
		
                
        );   */
		
		$data = ['source' => $fb->fileToUpload('/home/globappq/public_html/cliq/justpics/' . $newname), 'message' => $message];

		$request = $fb->post($id . '/photos/', $data, $accesstoken);


						
		$response = $request->getGraphNode()->asArray();
	
	echo $response['id'];
	$fbid1= $response['id'];
	
	//$fbid=substr($fbid1,16);
	//echo '<br>';
	//echo $fbid;
	$val=1;
	$insert = $db->query("INSERT into facebook_img (postid, imgid,fb_like) VALUES ('$fbid1', '$newname','$val')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
  	// Now you can redirect to another page and use the
  	// access token from $_SESSION['facebook_access_token']

	echo " <head><style>
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
			.button{
			    background-color: #45a049;
				border: none;
			    color: white;
			    padding: 15px 32px;
			    text-align: center;
			    text-decoration: none;
			    display: inline-block;
			    font-size: 16px;
			    margin: 4px 2px;
			    cursor: pointer;
			}
			</style></head>
			<div class='center'>
			<br><br>
			<label><b><i> Advertisement Posted! </i></b> </label>
			<br><br><br><br><br><br><br>
				<a class='button' href='../thirdTask-master/home.php' id='btn'>Home</a>
		      </div>";
echo "<script type='text/javascript'>alert('Advertisement Posted on FACEBOOK');</script>";

} else {
	$helper = $fb->getRedirectLoginHelper();
	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/imagefbpost.php', $permissions);
	echo "<script>window.top.location.href='".$loginUrl."'</script>";
}
