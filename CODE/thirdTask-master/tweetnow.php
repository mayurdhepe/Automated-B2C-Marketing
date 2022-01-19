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
// #########################   TWITTER-----> 3   ###############################################

require '/var/www/html/twitter/autoload.php';
            use Abraham\TwitterOAuth\TwitterOAuth;

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
	
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	// getting basic user info
	$user = $connection->get("account/verify_credentials");
	
	// printing username on screen
	//echo $user->screen_name;
	
	/* //retriving image
	$result = $db->query("select image from images where id=(select max(id) from images)");
	//$path = "/home/globappq/public_html/cliq/";
	//$name = "XYZ.jpg";
	if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        //header("Content-type: image/jpg"); 
        //echo "image selected"; 
		 //echo $imgData['image']; 
		  /* $file = fopen($path."/".$name,"w");
		   echo "File name: ".$path."$name\n";
		   fwrite($file, base64_decode($imgData));
		   fclose($file); 
		   
		   //file_put_contents($path."/".$name, base64_decode($imgContent));

    }else{
        echo 'Image not found...';
    } */
	
	
	// posting tweet on user profile
	$tweetWM = $connection->upload('media/upload', ['media' => "/trainingimages/img4.jpg"]);
	//echo $name1;
	// tweeting with uploaded media (image) using media_id
	$tweet = $connection->post('statuses/update', ['media_ids' => $tweetWM->media_id, 'status' => 'YOO']);
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
	//echo $tweet_id;
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
				<a class='button' href='home.php' id='btn'>Home</a>
		      </div>";
echo "<script type='text/javascript'>alert('Advertisement Posted on Twitter');</script>";
}


}

//################################# FACEBOOK------>1 #############################################



?>
