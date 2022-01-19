<?php 

include "../trending/twitteroauth/twitteroauth.php";
$consumer_key = "Rny2LyXC6u2zNRt9naGfUMEEn";
$consumer_secret = "iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9";
$access_token = "878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY";
$access_token_secret = "lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK";
$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);


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
		
		$sql = "SELECT * FROM twitter_img";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        $id=$row->postid;
		$mediaurl=$row->imgid;
		
		$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/show.json?id='.$id);
	echo "<img src='http://cliq.globalsuperelite.com/justpics/$mediaurl' height='200' width='200'/>";
	
	foreach($tweets as $t)   
	{
		echo $t->user->favourites_count;
	}
	//echo $fav;
		/*
		echo "<pre>";
		print_r($tweets);
		echo "</pre>";
		*/
    }
}
	
?>