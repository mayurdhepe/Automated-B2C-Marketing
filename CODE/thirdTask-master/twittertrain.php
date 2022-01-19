<?php

$cat = $_POST['category'];

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
		
		$choose="SELECT * from traintwt WHERE cat='$cat'";
				if ($result = $db->query($choose)) {    
     while ($row = $result->fetch_object()) 
	 {
        $id1 = $row->counter;
	 }
				}	 
	
	
		mysqli_close($db);
		
		
		
$dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_ngouser';
        $dbPassword = 'ngouser123';
        $dbName     = 'globappq_ngo';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db1 = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);
        
        // Check connection
        if($db1->connect_error){
            die("Connection failed: " . $db1->connect_error);
        }
		
		$maxid1="SELECT * from $cat WHERE id=$id1";
				if ($result = $db1->query($maxid1)) {    
     while ($row = $result->fetch_object()) 
	 {
        $maxid = $row->id;
		$img = $row->imglink;
		$website = $row->WebsiteName;
		$category = $row->Category;
		$title = $row->Title;
		$price = $row->Price;
		$discount = $row->discount;
		 echo $maxid;
		 echo '<br>';
		echo $img;
		echo '<br>';
		 echo $title;
	 }
				}
				
	mysqli_close($db1);
	
		$name = basename($img);
	$newline= ' ';
	$web='Website : ';
	$pr='Price: ';
	$at=' at ';
	$per='%';
	$disc=' discount!! ';
	$rs='Rs';
	$message = $title.$newline.$pr.$rs.$price.$newline.$at.$discount.$per.$disc.$newline.$web.$website;
	file_put_contents("/home/globappq/public_html/cliq/trainingimages/$name", file_get_contents($img));
	echo '<br>';
	echo $name; 
	
	require '/home/globappq/public_html/cliq/twitter/autoload.php';
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
	//header("Location: $url");
        return;
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
	$tweetWM = $connection->upload('media/upload', ['media' => "/home/globappq/public_html/cliq/trainingimages/$name"]);
	//echo $name1;
	// tweeting with uploaded media (image) using media_id
	$tweet = $connection->post('statuses/update', ['media_ids' => $tweetWM->media_id, 'status' => $message]);
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
}
	$dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_cliq';
        $dbPassword = 'cliquser123';
        $dbName     = 'globappq_cliq';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db2 = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);
        
        // Check connection
        if($db2->connect_error){
            die("Connection failed: " . $db2->connect_error);
        }
		
		date_default_timezone_set('Asia/Kolkata');
		echo 'Current TimeStamp is:  ';
		echo date('Y-m-d H:i');
		$timestamp = date('Y-m-d H:i');
	  $sql = $db2->query("INSERT INTO twitterdata(description,name,time,tpostid,cat)VALUES('$message','$name','$timestamp','$tweet_id','$cat')");
         //$sql= "INSERT INTO '$cat'(desc,name,social,time)VALUES('$message','$name','$j','$timestamp')";

if(!$sql){
           die('Error:' . mysqli_error($db2));
        }else{
            echo "success";
        } 
		
		
  	
		echo '<br>';
		$id1++;
		$update = $db2->query("UPDATE traintwt SET counter=$id1 WHERE cat='$cat'");
		  if(!$update){
           die('Error:' . mysqli_error($db2));
        }else{
            echo "success";
        } 
		mysqli_close($db2);
		
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
	
	?>