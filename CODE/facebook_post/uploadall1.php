<?php


		
session_start();

require_once __DIR__ . '/vendor/autoload.php'; // download official fb sdk for php @ https://github.com/facebook/php-graph-sdk
//define("UPLOAD_DIR", "/home/globappq/public_html/cliq/justpics/");

$fb = new \Facebook\Facebook([
  'app_id' => '198297070745933',
  'app_secret' => 'd3b43710b1965c0ab2be4b54af85f247',
  'default_graph_version' => 'v2.11',
]);

   $permissions = []; // optional
   $helper = $fb->getRedirectLoginHelper();
  
  // $accessToken="EAACEdEose0cBALC2kgTKXobBefEyWhdMp2MdV6gWlYVeiBs2ZAWeT6ZBGL6dIIN9JuW5pxbb187629WE679uZCJfZCrygRthYHtNH3WaXeJWR8NsAbc6f2qpwq9cgKGGSVZAEot4kHG52m51R8ZAbGxjwZBTTt7LZAP6rCQohEzoqzmafycUdMv1QgLcApogoJZAKhMqoz73QLQZDZD";
   $accessToken = $helper->getAccessToken();
if (isset($accessToken)) {
	
	$id= "879858028854213";


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
		
		$maxid1="SELECT id from promotions where id=(SELECT MAX(id) FROM promotions)";
				if ($result = $db->query($maxid1)) {    
     while ($row = $result->fetch_object()) 
	 {
        $maxid = $row->id;
	}
	} 
	
	
		
		
		$post="SELECT * from promotions WHERE id=$maxid";
				if ($result = $db->query($post)) {    
     while ($row = $result->fetch_object()) 
	 {
        $description = $row->description;
		$imgname = $row->imgname;
	}
				}
	
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
		 	if ($item['id']=='879858028854213'){			//== '324122224687486'   change
		 		
				$myurl="http://cliq.globalsuperelite.com/justpics/$imgname";
				//echo $name;
				$param = array(
				   'url' => $myurl,
				 	 'access_token' => $item['access_token'],
				 	 'message' => "$description"
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
				} 
				else {
				echo $response;
				echo '<br>';
				$fbpostid = substr($response,7,15);
				
				$update = $db->query("UPDATE promotions SET fbpostid='$fbpostid' WHERE id=$maxid");
		  if(!$update){
           die('Error:' . mysqli_error($db));
        }else{
            echo "success";
        } 
		mysqli_close($db);
		
				echo "<script type='text/javascript'>alert('Advertisement Posted on Facebook');</script>";
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
			
				<a class='button' href='../thirdTask-master/existcamp.php' id='btn'>Home</a>
		      </div>";

			
		echo '<br>';
		
		
		
             
				}

		 	}
		 }
}	 
	
	

	
	
	
 else {
	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/uploadall1.php', $permissions);
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
