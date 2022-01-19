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
	


 		
		
		$cat = 'mobile';

if($cat== 'Valentine')
	$id= "1018100471664542";
if($cat== 'Winter')
	$id= "312326849275479";
if($cat== 'mobile')
	$id= "566617473674767";

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
		
		$choose="SELECT * from trainfb WHERE cat='$cat'";
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
		 	if ($item['id']==$id){			//== '324122224687486'   change
		 		
				$myurl="http://cliq.globalsuperelite.com/trainingimages/$name";
				//echo $name;
				$param = array(
				   'url' => $myurl,
				 	 'access_token' => $item['access_token'],
				 	 'message' => "$message"
				);
					

				$ch = curl_init();
				$url = "https://graph.facebook.com/$id/photos";
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
				echo "<script type='text/javascript'>alert('Advertisement Posted on Facebook');</script>";
				echo "
			<div class='center'>
			<br><br>
			
				<a class='button' href='/group7/secondTask/timeline.php' id='btn'>Home</a>
		      </div>
";

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
		$j=1;
		date_default_timezone_set('Asia/Kolkata');
		echo 'Current TimeStamp is:  ';
		echo date('Y-m-d H:i');
		$timestamp = date('Y-m-d H:i');
	  $sql = $db2->query("INSERT INTO $cat(description,name,social,time,fbpostid)VALUES('$message','$name','$j','$timestamp','$fbpostid')");
         //$sql= "INSERT INTO '$cat'(desc,name,social,time)VALUES('$message','$name','$j','$timestamp')";

if(!$sql){
           die('Error:' . mysqli_error($db2));
        }else{
            echo "success";
        } 
		
		
  	
		echo '<br>';
		$id1++;
		$update = $db2->query("UPDATE trainfb SET counter=$id1 WHERE cat='$cat'");
		  if(!$update){
           die('Error:' . mysqli_error($db2));
        }else{
            echo "success";
        } 
		mysqli_close($db2);
		
             
				}

		 	}
		 }
}	 
	
	

	
	
	
 else {
	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/uploadall2.php', $permissions);
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
