<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Marketing</title>
<!-- CSS -->
<style>
body
{
background-image: url("cc1.jpg");
}

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
</style>

</head>

<body>
<?php
ini_set('display_errors', 1);
session_start();
  $name= $_SESSION["name"];
			require '/var/www/html/twitter/autoload.php';
            use Abraham\TwitterOAuth\TwitterOAuth;

		$description=$_POST['desc'];
		
		$name1=$_POST['img'];
	//#######################$name1 contains image name now! ###################################
        
		
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
        
        date_default_timezone_set('Asia/Kolkata');
		echo 'Current TimeStamp is:  ';
		echo date('Y-m-d H:i');
		$timestamp = date('Y-m-d H:i');
        $cname = $_POST['camp'];
		echo $cname;
        //Insert image content into database
        
   
	// #########################   TWITTER-----> 3   ###############################################

if(in_array('twitter', $_POST['choice']) && !in_array('facebook', $_POST['choice'])){
	
	echo "yes!";
	        
		session_start();
		define('CONSUMER_KEY','4xR3gmhjJFnRiZIzMmcc7rGle'); // add your app consumer key between single quotes
	define('CONSUMER_SECRET', 'mwyaxUxi2SxRsfx7NiSVfDbRx0sS4nOKBAcXCVBaDPKOGYbM5v'); // add your app consumer secret key between single quotes
	define('OAUTH_CALLBACK', 'http://127.0.0.1/twitter/callback.php'); // your app callback URL
	if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo $url;
	//header("Location: $url");
        return;
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	// getting basic user info
	$user = $connection->get("account/verify_credentials");
	
	// printing username on screen
	//echo $user->screen_name;
	
	
	
	
	// posting tweet on user profile
	$tweetWM = $connection->upload('media/upload', ['media' => "/var/www/html/thirdTask-master/$name1"]);
	//echo $name1;
	// tweeting with uploaded media (image) using media_id
	$tweet = $connection->post('statuses/update', ['media_ids' => $tweetWM->media_id, 'status' => $description]);
	//print_r($tweet);

	/*//INSERT POST ID into database
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
		$tweet_id = substr($line,11,19);
		echo $tweet_id;
	}*/
	foreach($tweet as $t)
	{
	$tweet_id=$tweet->id_str;
	}
    
	$insert = $db->query("INSERT into promotions (username, campaign,description, imgname, media, timestamp, tweetid) VALUES ('$name', '$cname','$description','$name1','twitter','$timestamp','$tweet_id')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 

    //fclose($handle);
	
	
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
			<label><b><i> Tweet Posted! </i></b> </label>
			<br><br><br><br><br><br><br>
				<a class='button' href='existcamp.php' id='btn'>Home</a>
		      </div>";
echo "<script type='text/javascript'>alert('Advertisement Posted on Twitter');</script>";
}


}

//################################# FACEBOOK------>1 #############################################

 if(in_array('facebook', $_POST['choice']) && !in_array('twitter', $_POST['choice'])){
	
	$insert1 = $db->query("INSERT into promotions (username, campaign,description, imgname, media, timestamp) VALUES ('$name', '$cname','$description','$name1','facebook','$timestamp')");
        if($insert1){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
	
		
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
			
				<a class='button' href='../facebook_post/uploadall1.php' id='btn'>Login With FACEBOOK</a>
		      </div>";

}


	##################FACEBOOK and TWITTER----->5 ###################################################
 if(in_array('facebook', $_POST['choice']) && in_array('twitter', $_POST['choice'])){
	
	session_start();
		define('CONSUMER_KEY','Rny2LyXC6u2zNRt9naGfUMEEn'); // add your app consumer key between single quotes
	define('CONSUMER_SECRET', 'iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9'); // add your app consumer secret key between single quotes
	define('OAUTH_CALLBACK', 'http://cliq.globalsuperelite.com/twitter/callback.php'); // your app callback URL
	if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo $url;
	//header("Location: $url");
        return;
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	// getting basic user info
	$user = $connection->get("account/verify_credentials");
	
	// printing username on screen
	//echo $user->screen_name;
	
	
	
	
	// posting tweet on user profile
	$tweetWM = $connection->upload('media/upload', ['media' => "/home/globappq/public_html/cliq/justpics/$name1"]);
	//echo $name1;
	// tweeting with uploaded media (image) using media_id
	$tweet = $connection->post('statuses/update', ['media_ids' => $tweetWM->media_id, 'status' => $description]);
	//print_r($tweet);

	/*//INSERT POST ID into database
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
		$tweet_id = substr($line,11,19);
		echo $tweet_id;
	}*/
	foreach($tweet as $t)
	{
	$tweet_id=$tweet->id_str;
	}
    
	$insert = $db->query("INSERT into promotions (username, campaign,description, imgname, media, timestamp, tweetid) VALUES ('$name', '$cname','$description','$name1','twitter','$timestamp','$tweet_id')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 

		$insert1 = $db->query("INSERT into promotions (username, campaign,description, imgname, media, timestamp) VALUES ('$name', '$cname','$description','$name1','facebook','$timestamp')");
        if($insert1){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    //fclose($handle);
	
	
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
			<label><b><i> Tweet Posted! </i></b> </label>
			<br><br><br><br><br><br><br>
				<a class='button' href='existcamp.php' id='btn'>Home</a>
		      </div>";
echo "<script type='text/javascript'>alert('Advertisement Posted on Twitter');</script>";
}

	
	
		
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
			
			<br><br><br><br><br><br><br>
				<a class='button' href='../facebook_post/uploadall1.php' id='btn'>Login with FACEBOOK</a>
		      </div>";

} 






?>
