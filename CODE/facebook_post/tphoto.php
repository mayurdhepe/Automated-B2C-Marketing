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


<html>
<body>
<?php 
session_start();
require_once __DIR__ . '/vendor/autoload.php';

define("UPLOAD_DIR", "/home/globappq/public_html/cliq/justpics/");


/*$host     = "192.185.129.7";
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
  
$sql="INSERT INTO imp_upload(name,details)VALUES('$name','$msg')";

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
  
  // $accessToken="EAACEdEose0cBALC2kgTKXobBefEyWhdMp2MdV6gWlYVeiBs2ZAWeT6ZBGL6dIIN9JuW5pxbb187629WE679uZCJfZCrygRthYHtNH3WaXeJWR8NsAbc6f2qpwq9cgKGGSVZAEot4kHG52m51R8ZAbGxjwZBTTt7LZAP6rCQohEzoqzmafycUdMv1QgLcApogoJZAKhMqoz73QLQZDZD";
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
		 	if ($item['id']=='879858028854213'){			//== '324122224687486'   change
		 		
				$myurl="http://cliq.globalsuperelite.com/justpics/IMG_20160724_130311_1_.jpg";
				//echo $name;
				$time = strtotime('01' . '-' . '31' . '-' . '2018' . ' ' . '17' . ':' . '30' . ':' . '20');
				$param = array(
				   'url' => $myurl,
				 	 'access_token' => $item['access_token'],
				 	 'message' => "Hi I'm a Marketer!",
					 'scheduled_publish_time' => $time
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
				
				echo "<script type='text/javascript'>alert('Advertisement Posted on Facebook');</script>";
				echo "
			<div class='center'>
			<br><br>
			
				<a class='button' href='/group7/secondTask/timeline.php' id='btn'>Home</a>
		      </div>
";

					
             
				}

		 	}
		 }
}
else {

	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/tphoto.php', $permissions);
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


</body>
</html>
