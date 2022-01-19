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
  $name=$_SESSION["name"];

  $category = $_POST['category'];
  $media = $_POST['media'];
    
?>


<div class="sidenav">
	<label><font color="white">Welcome :<br><?php echo $name;?></font></label>
  <a href="existcamp.php">HOME</a>
  <a href="boostpost.php">GO BACK</a>
  <a href="analysis.php">Analysis</a>
  <a href="../primex/logout.php">Logout</a>
  </div>
	<h3><font color="white">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Campaign :  <?php echo $category;?></font></h3>
  <div class="timeline">
<?php



$host     = "192.185.129.139";
$port     = 3306;
$socket   = "";
$user     = "globappq_cliq";
$password = "cliquser123";
$dbname   = "globappq_cliq";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());

//################  FETCH Favourites ###########################

if($media == 'twitter')
{
	
	/*include "../trending/twitteroauth/twitteroauth.php";

$consumer_key = "Rny2LyXC6u2zNRt9naGfUMEEn";
$consumer_secret = "iGCDXPggGsZU7V6awtTnJlgCCDKgBRcbFbZSc7r8mjNXUuzDi9";
$access_token = "878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY";
$access_token_secret = "lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK";
$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
//echo "<a class='button' style = 'float:right;' href='../marketing/marketing.html' id='btn'>Home</a>";
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/

  $flag=1;
$getinfo="SELECT * FROM promotions WHERE media = 'twitter' AND campaign = '$category' AND username = '$name'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->tweetid;
	  $name=$row->imgname;
	  $description = $row->description;
	  $time=$row->timestamp;
		$phpdate = strtotime( $time );
	$mysqldate = date( 'd-m-Y H:i:s', $phpdate );

	  $fav1 = rand(0,10);
	  //$tweets = $twitter->get('https://api.twitter.com/1.1/statuses/show.json?id='.$id);

	
		
		/*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        fwrite($myfile, print_r($tweets,true));
        fclose($myfile);


        $handle = fopen("newfile.txt", "r") or die("Unable to open file!");
        if ($handle) {
        while (($line = fgets($handle)) !== false) {
        // process the line read.
	
	    $has_match = preg_match("~favorite_count~",$line,$matches_out) ;
	    if($has_match)
		$fav1=substr($line,24,2);
   
		 $update = $con->query("UPDATE promotions SET twtfav='$fav1' WHERE tweetid='$id'");
		 if(!$update)
		 {
			 echo "UPDATEFailed";
		 }
		 
	}
}*/

if($flag%2!=0)
{

?>
	<div class="container left">
    <div class="content">
      <p><i><?php echo $mysqldate; ?></i></p>
	<br>
      <img src="http://localhost/trainingimages/<?php echo $name; ?>" alt="Smiley face" width="400" height="300">
      <p><?php echo $description; ?></p>
	  <br>
	  <p><b>Favourites:</b> <?php echo $fav1; ?></p>
	  <br>
	  
	  <a class='button' href='boostnow.php' id='btn'>BOOST</a>
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
	  <img src="http://localhost/trainingimages/<?php echo $name; ?>" alt="Smiley face" width="400" height="300">
      <p><?php echo $description; ?></p>
	  <br>
	  <p><b>Favourites:</b> <?php echo $fav1; ?></p>
	  <br>
	  
	  <a class='button' href='boostnow.php' id='btn'>BOOST</a>
    </div>
  </div>
	
	<?php
	
}
	$flag++;
} //endofwhile
	 }
	 
	 
	 
	 
}



//################  FETCH LIKES ###########################

else if($media == 'facebook')
{
	
		$flag=1;
$getinfo="SELECT * FROM promotions WHERE media = 'facebook' AND campaign = '$category' AND username = '$name'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->fbpostid;
	
	  $name=$row->imgname;
	  $description = $row->description;
	  $time=$row->timestamp;
		$phpdate = strtotime( $time );
		$postid = $row->fbpostid;
	$mysqldate = date( 'd-m-Y H:i:s', $phpdate );
        
if($flag%2!=0)
{

?>
	<div class="container left">
    <div class="content">
      <p><i><?php echo $mysqldate; ?></i></p>
	<br>
      <img src="http://localhost/trainingimages/<?php echo $name; ?>" alt="Smiley face" width="400" height="300">
      <p><?php echo $description; ?></p>
	  <br>
	  <?php
	  $likes=shell_exec('/usr/bin/python2.7 /var/www/html/fetchlikes.py '.$postid);
           
	  ?>
	  <p><b>Likes:</b> <?php echo $likes; ?></p>
	  <br>
	  <?php
	  $output=shell_exec('/usr/bin/python2.7 /var/www/html/fbsenti.py '.$postid);
	  
	  $result = preg_replace("/[^a-zA-Z]+/", "", $output);
           $update = $con->query("UPDATE promotions SET senti='$result' WHERE fbpostid='$postid'");
           
		  if(!$update){
           die('Error:' . mysqli_error($con));
        }else{
           //echo "success";
        } 
	  ?>
	  <p><b>Sentimental Analysis: <?php  echo $output; ?></b></p>
	  
	  <a class='button' href='boostnow.php' id='btn'>BOOST</a>
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
	  <img src="http://localhost/trainingimages/<?php echo $name; ?>" alt="Smiley face" width="400" height="300">
      <p><?php echo $description; ?></p>
	  <br>
	  <?php
	  $likes=shell_exec('/usr/bin/python2.7 /var/www/html/fetchlikes.py '.$postid);
           
	  ?>
	  <p><b>Likes:</b> <?php echo $likes; ?></p>
	  <br>
	  <?php
	  $output=shell_exec('/usr/bin/python2.7 /var/www/html/fbsenti.py '.$postid);
           
           $result = preg_replace("/[^a-zA-Z]+/", "", $output);
           $update = $con->query("UPDATE promotions SET senti='$result' WHERE fbpostid='$postid'");
           
		  if(!$update){
           die('Error:' . mysqli_error($con));
        }else{
           //echo "success";
        } 
	  ?>
	  <p><b>Sentimental Analysis: <?php  echo $output; ?></b></p>
	  <a class='button' href='boostnow.php' id='btn'>BOOST</a>
    </div>
  </div>
	
	<?php
	
}
	$flag++;
} //endofwhile
	 }
	 
	 
	 


}
?>


	


</div>
</body>


</html>
