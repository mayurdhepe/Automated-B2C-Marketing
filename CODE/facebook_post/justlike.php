<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    box-sizing: border-box;
}

body {
    background-color: #474e5d;
    font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: white;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
}

/* Container around content */
.container {
    padding: 10px 40px;
    position: relative;
    background-color: inherit;
    width: 50%;
}

/* The circles on the timeline */
.container::after {
    content: '';
    position: absolute;
    width: 25px;
    height: 25px;
    right: -17px;
    background-color: white;
    border: 4px solid #FF9F55;
    top: 15px;
    border-radius: 50%;
    z-index: 1;
}

/* Place the container to the left */
.left {
    left: 10%;
}

/* Place the container to the right */
.right {
    left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
    content: " ";
    height: 0;
    position: absolute;
    top: 22px;
    width: 0;
    z-index: 1;
    right: 30px;
    border: medium solid white;
    border-width: 10px 0 10px 10px;
    border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
    content: " ";
    height: 0;
    position: absolute;
    top: 22px;
    width: 0;
    z-index: 1;
    left: 30px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
    left: -16px;
}

/* The actual content */
.content {
    padding: 5px 5px;
    background-color: white;
    position: relative;
    border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media all and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
    left: 31px;
  }
  
  /* Full-width containers */
  .container {
    width: 100%;
    padding-left: 70px;
    padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container::before {
    left: 60px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
    left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
    left: 0%;
  }
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}
.button{
			    background-color: #7E65C2;
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
 session_start();
  $username=$_SESSION["name"];
  
?>

<div class="sidenav">
	<label><font color="white">Welcome :<br><?php echo $username;?></font></label>
  <a href="../thirdTask-master/existcamp.php">HOME</a>
  <a href="../thirdTask-master/analysis.php">Analysis</a>
  <a href="../primex/logout.php">Logout</a>
  </div>

  <div class="timeline">




<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

//echo "<br><br><a class='button' style = 'float:right;' href='../marketing/marketing.html' id='btn'>Home</a>";
//echo "<br><br>";
$fb = new \Facebook\Facebook([
  'app_id' => '198297070745933',
  'app_secret' => 'd3b43710b1965c0ab2be4b54af85f247',
  'default_graph_version' => 'v2.11',
]);

   $permissions = ['user_photos']; // optional
  $helper = $fb->getRedirectLoginHelper();
   $accessToken = $helper->getAccessToken();
   $host     = "192.185.129.139";
$port     = 3306;
$socket   = "";
$user     = "globappq_cliq";
$password = "cliquser123";
$dbname   = "globappq_cliq";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());



if (isset($accessToken)) {
	 
	 
	 $maxid1="SELECT category from oneplus where id=(SELECT MAX(id) FROM oneplus)";
				if ($result = $con->query($maxid1)) {    
     while ($row = $result->fetch_object()) 
	 {
        $category = $row->category;
	}
	}
	echo "<h3><font color='white'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Campaign : $category</font></h3>";
	//echo $category;
	$flag=1;
	  $getinfo="SELECT * FROM promotions WHERE media= 'facebook' AND campaign = '$category' AND username = '$username'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
        $id1 = $row->fbpostid;
	$description = $row->description;
	$name= $row->imgname;
        $time=$row->timestamp;
	$phpdate = strtotime( $time );
	$mysqldate = date( 'd-m-Y H:i:s', $phpdate );
		$url = "https://graph.facebook.com/v2.11/$id1/likes?&summary=total_count&access_token={$accessToken}";
		                                        
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
		 /*echo "<pre>";
		 var_dump($st);
		 echo "</pre>";*/
		 $result=json_decode($st,TRUE);
		/* //echo "<pre>";
		 //var_dump($result);
		 //echo "</pre>";*/
		  $likes = $result['summary']['total_count'];
		
		 //echo "<img src='http://cliq.globalsuperelite.com/justpics/$name' alt='Mountain View' style='width:304px;height:228px;'>";
		 //echo '<br>';
		 //echo "Number of Likes for Post is  : ";
		 //echo $id1;
		 //echo '<br>';
		// echo "<img src='http://internship.globalsuperelite.com/group7/facebook_ads/fb_like.jpg'  style='width:30px;height:30px;'><b>            $likes</b></th>";
		  //echo "<h3>$likes</h3>";  
		  //echo "<h3>$id1</h3>";
		
		  $update = $con->query("UPDATE promotions SET fblike='$likes' WHERE fbpostid='$id1'");
		  if(!$update){
           die('Error:' . mysqli_error($con));
        }else{
           //echo "success";
        } 

		  if($flag%2!=0)
{

?>
	<div class="container left">
    <div class="content">
      <p><i><?php echo $mysqldate; ?></i></p>
	<br>
      <img src="http://cliq.globalsuperelite.com/justpics/<?php echo $name; ?>" alt="Smiley face" width="400" height="300">
	<br>
      <p><?php echo $description; ?></p>
	  <br>
	  <p><b>Likes:</b> <?php echo $likes; ?></p>
	  <a class='button' href='../thirdTask-master/boostnow.php' id='btn'>BOOST</a>
    </div>
  </div>
  <?php 
  
}

else if($flag%2==0)
{
	
	?>
	<div class="container right">
    <div class="content">
      <p><i><?php echo $mysqldate; ?></i></p>
	<br>
	  <img src="http://cliq.globalsuperelite.com/justpics/<?php echo $name; ?>" alt="Smiley face" width="400" height="300">
	<br>
      <p><?php echo $description; ?></p>
	  <br>
	  <p><b>Likes:</b> <?php echo $likes; ?></p>
	  <a class='button' href='../thirdTask-master/boostnow.php' id='btn'>BOOST</a>
    </div>
  </div>
	
	<?php
	
}
	$flag++;
		 
		
		}
		}

} else {

	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/justlike.php', $permissions);
	echo "<br><br><label>S &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>";
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
?>
</div>

</body>
</html>
