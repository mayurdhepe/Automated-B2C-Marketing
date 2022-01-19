<!DOCTYPE html>
<html lang="en">
<head>

<title>Marketing</title>

</head>

<body>








<?php

			include "../trending/twitteroauth/twitteroauth.php";


//echo "<a class='button' style = 'float:right;' href='../marketing/marketing.html' id='btn'>Home</a>";
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$consumer_key = "Rny2LyXC6u2zNRt9naGfUMEEn";
$consumer_secret = "iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9";
$access_token = "878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY";
$access_token_secret = "lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK";
$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$host     = "192.185.129.139";
$port     = 3306;
$socket   = "";
$user     = "globappq_cliq";
$password = "cliquser123";
$dbname   = "globappq_cliq";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());


/*echo "<table>
  <tr>
    <th>Post</th>
    <th>Favourites</th>
    
  </tr>";*/

$getinfo="SELECT * FROM promotions WHERE media = 'twitter'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->tweetid;
	  $name=$row->imgname;

	  echo "<tr>";
		echo "<th><img src='http://cliq.globalsuperelite.com/justpics/$name'  style='width:304px;height:228px;'></th>";
		echo '<br>';
		
		$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/show.json?id='.$id);

	
		
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, print_r($tweets,true));
        fclose($myfile);


        $handle = fopen("newfile.txt", "r") or die("Unable to open file!");
        if ($handle) {
        while (($line = fgets($handle)) !== false) {
        // process the line read.
	
	    $has_match = preg_match("~favorite_count~",$line,$matches_out) ;
	    if($has_match)
		$fav1=substr($line,24,2);
   
		 $update = $con->query("UPDATE promotions SET twtfav='.$fav1 WHERE tweetid='$id'");
			

	
    }
}
	echo "<th>Number of Favourites for Post is : ";
	 echo '<br>';
	 //echo "<img src='http://internship.globalsuperelite.com/group7/twittergf/image.jpg'  style='width:30px;height:30px;'><b> $fav</b></th>";
	 echo "<h3>$fav1</h3>"; 
	

		fclose($handle);
		
		
		

   
	 }	
	 }	 
 ?>


</div>
</body>
</html>