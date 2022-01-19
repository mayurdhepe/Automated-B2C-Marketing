
<?php 
session_start();
require_once __DIR__ . '/Facebook/autoload.php';

define("UPLOAD_DIR", "/home/globappq/public_html/cliq/justpics");

/*
$host     = "192.185.129.7";
$port     = 3306;
$socket   = "";
$user     = "globapzx_check";
$password = "check";
$dbname   = "globapzx_demo";

$name= $_POST['myFile'];
$msg= $_POST['mymsg'];
echo $msg;
//echo $name;
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());
  
$sql="INSERT INTO imp_upload(name)VALUES('$name')";

if(!mysqli_query($con,$sql))
  {
    die('Error:' . mysqli_error($con));
  }
//echo $name;
//$myfile = fopen("/home/globapzx/public_html/internship/group7/facebook_ads/newfile.txt", "w") or die("Unable to open file!");

//fwrite($myfile, $name);
//fclose($myfile);
*/

//########################################################################################
$fb = new \Facebook\Facebook([
  'app_id' => '198297070745933',
  'app_secret' => 'd3b43710b1965c0ab2be4b54af85f247',
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
				$maxid1="SELECT id from imp_upload where id=(SELECT MAX(id) FROM imp_upload)";
				if ($result = $con->query($maxid1)) {    
     while ($row = $result->fetch_object()) 
	 {
        $maxid = $row->id;
	}
	}
	//echo $maxid;
	$x=$maxid-1;	
        //echo "The value of x is ".$x."   ";
			$getinfo = "SELECT name FROM imp_upload WHERE id=$x";
			if ($result = $con->query($getinfo)) {    
     while ($row = $result->fetch_object()) 
	 {
        $newname = $row->name;
	}
	}		
				$myurl="http://cliq.globalsuperelite.com/justpics/IMG_20160724_130311_1_.jpg";
				//echo $name;
				$param = array(
				   'url' => $myurl,
				 	 'access_token' => $item['access_token'],
				 	 //'message' => "$msg"
					 'message' => "Hello I am a Marketer."
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
				$postid = substr($response,7,15);
                $sql="INSERT INTO postid(postid)VALUES('$postid')";

              if(!mysqli_query($con,$sql))
                 {
                     die('Error:' . mysqli_error($con));
                  }				
             
				}

		 	}
		 }
		 
		 
		 
		

} else {

	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/thirdTask-master/tphoto.php', $permissions);
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

	/*echo "<form method='post' enctype='multipart/form-data' action='$loginUrl'>
<label for='file'>Upload Image to Post on Facebook page:</label>
<input type='file' name='myFile' id='myFile'>
</p>
<input type='submit' value='Upload'>
</form>";*/


	
}
	
