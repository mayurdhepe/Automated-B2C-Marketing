<html>
<head>
<meta name="txtweb-appkey" content=""/>
</head>
<body>
<?php
require_once('twitteroauth/twitteroauth.php');
$msg=$_GET['txtweb-message'];
$woid = "";// --- where on earth ID --- (1 = global/earth) --- 
$num_tweets = 100;
$consumerkey = "Rny2LyXC6u2zNRt9naGfUMEEn";
$consumersecret = "iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9";
$accesstoken = "878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY";
$accesstokensecret = "lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK";
$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
if($msg == NULL)
{
	
echo "Twitter trends :- <br/><br/>";
echo "Recent Voices: <br/>";
https://api.twitter.com/1.1/trends/place.json?id=1
$tweets = $connection->get("https://api.twitter.com/1.1/trends/place.json?id=".$woid);
foreach($trends as $trend) {
	echo "<p>".$trend->text."</p>";
}
}
?>

<?php
//or you can use below code no authentication required
?>


<?php
$woeid = 1;  // --- where on earth ID --- (1 = global/earth) --- 
$json = file_get_contents("http://api.twitter.com/1/trends/".$woeid.".json", true); //getting the file content
$decode = json_decode($json, true); //getting the file content as array
 
## echo "<pre>\r\n"; 
## print_r($decode);  // debug view
## echo "</pre>\r\n"; 
 
echo "<h2>TRENDS: ".$decode[0]['locations'][0]['name']."</h2> \r\n";
 
$data = $decode[0]['trends']; 
 
foreach ($data as $item) { 
   echo "<br /> ".$item['name']."\r\n";
   echo "<br /> <a href=\"".$item['url']."\" target=\"_blank\">".$item['name']."</a>\r\n";
   echo "<br /> \r\n";
}
 
?>