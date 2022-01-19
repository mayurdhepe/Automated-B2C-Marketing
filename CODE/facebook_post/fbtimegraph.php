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


.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 1.2em;
width: 70em;
padding: 1em;
border: 2px solid #ccc;
background-color: #ADD8E6;
}

.myForm * {
box-sizing: border-box;
}

.myForm fieldset {
border: none;
padding: 0;
}

.myForm hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 

.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;
}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm input[type="text"],
.myForm input[type="tel"],
.myForm input[type="email"],
.myForm input[type="datetime-local"],
.myForm select,
.myForm textarea {
display: block;
width: 100%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #4acfcf;
border: none;
font-weight: bold;
margin-top: 1em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
}

.center {
    text-align: center;
     
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -400px 0 0 -400px;
	width:300px;
	height:380px;
}

a
{
color: #0000A0
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

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

</head>

<body>

<div class="myForm">


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

/* echo "<table>
  <tr>
    <th>Post</th>
    <th>Likes</th>
    
  </tr>";
 */
if (isset($accessToken)) {
	 
	     $getinfo="SELECT * FROM Winter";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
        $id1 = $row->fbpostid;
	//$timestamp= $row->time;
	$name= $row->name;
        //echo $id1;
	


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
		 $result=json_decode($st,TRUE);
		 //echo "<pre>";
		 //var_dump($result);
		 //echo "</pre>";
		  $likes = $result['summary']['total_count'];
		
		 
		  $update = $con->query("UPDATE Winter SET fblike=$likes WHERE fbpostid=$id1");
		  if(!$update){
           die('Error:' . mysqli_error($con));
        }else{
            //echo "success";
        } 

		  
		  echo "</tr>";
		
		
		}
		}

		//#############################################################
		
		$array1=array();
   		$array2=array();




  $getinfo="SELECT * FROM Winter";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
          $id = $row->fbpostid;
	  $array1[]=$row->fblike;
          $timestamp=$row->time;
          $dt = DateTime::createFromFormat("Y-m-d H:i:s",$timestamp);
          $array2[] = $dt->format('H'); // '20'
	  //echo $dt->format('H');
	  echo '<br>';
          }
	 } 
	  
  ?>
<!DOCTYPE HTML>
<html>
<head>  
<h1>Facebook Time Vs Likes Graphs<h1>
<script>
function myFunction() {

var javaarray = new Array();

    <?php foreach($array1 as $val){ ?>
        javaarray.push('<?php echo $val; ?>');
    <?php } ?>

var timearray = new Array();
<?php foreach($array2 as $val1){ ?>
        timearray.push('<?php echo $val1; ?>');
	
    <?php } ?>

//var num = parseInt(htmlString);
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Winter Facebook Analysis"
	},
	axisX:{
		title: "Time",
		includeZero: false
	},
	axisY:{
		title: "Likes",
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
		{ x: parseInt(timearray[0]),y: parseInt(javaarray[0])},
		{ x: parseInt(timearray[1]),y: parseInt(javaarray[1])},
		{ x: parseInt(timearray[2]),y: parseInt(javaarray[2])},
		{ x: parseInt(timearray[3]),y: parseInt(javaarray[3])},
		{ x: parseInt(timearray[4]),y: parseInt(javaarray[4])},
		{ x: parseInt(timearray[5]),y: parseInt(javaarray[5])},
		{ x: parseInt(timearray[6]),y: parseInt(javaarray[6])},
		{ x: parseInt(timearray[7]),y: parseInt(javaarray[7])},
		{ x: parseInt(timearray[8]),y: parseInt(javaarray[8])},
		{ x: parseInt(timearray[9]),y: parseInt(javaarray[9])},
		{ x: parseInt(timearray[10]),y: parseInt(javaarray[10])},
		{ x: parseInt(timearray[11]),y: parseInt(javaarray[11])},
		{ x: parseInt(timearray[12]),y: parseInt(javaarray[12])}
		
		
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    myFunction();
</script>
<br>
</body>
</html>


<?php
//###################################################################################
  $getinfo="SELECT * FROM valentine";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
        $id1 = $row->fbpostid;
	//$timestamp= $row->time;
	$name= $row->name;
        //echo $id1;
	


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
		 $result=json_decode($st,TRUE);
		 //echo "<pre>";
		 //var_dump($result);
		 //echo "</pre>";
		  $likes = $result['summary']['total_count'];
		
		 
		  $update = $con->query("UPDATE valentine SET fblike=$likes WHERE fbpostid=$id1");
		  if(!$update){
           die('Error:' . mysqli_error($con));
        }else{
            //echo "success";
        } 

		  
		  echo "</tr>";
		
		
		}
		}

		//#############################################################
		
		$array3=array();
   		$array4=array();




  $getinfo="SELECT * FROM valentine";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
          $id = $row->fbpostid;
	  $array3[]=$row->fblike;
          $timestamp = $row->time;
          $dt = DateTime::createFromFormat("Y-m-d H:i:s",$timestamp);
          $array4[] = $dt->format('H'); // '20'
	  echo $dt->format('H');
	  echo '<br>';
          }
	 } 
?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
function myFunction1() {

var javaarray = new Array();

    <?php foreach($array3 as $val){ ?>
        javaarray.push('<?php echo $val; ?>');
    <?php } ?>

var timearray = new Array();
<?php foreach($array4 as $val1){ ?>
        timearray.push('<?php echo $val1; ?>');
	
    <?php } ?>

//var num = parseInt(htmlString);
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Valentine Facebook Analysis"
	},
	axisX:{
		title: "Time",
		includeZero: false
	},
	axisY:{
		title: "Likes",
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
		{ x: parseInt(timearray[0]),y: parseInt(javaarray[0])},
		{ x: parseInt(timearray[1]),y: parseInt(javaarray[1])},
		{ x: parseInt(timearray[2]),y: parseInt(javaarray[2])},
		{ x: parseInt(timearray[3]),y: parseInt(javaarray[3])},
		{ x: parseInt(timearray[4]),y: parseInt(javaarray[4])},
		{ x: parseInt(timearray[5]),y: parseInt(javaarray[5])},
		{ x: parseInt(timearray[6]),y: parseInt(javaarray[6])},
		{ x: parseInt(timearray[7]),y: parseInt(javaarray[7])},
		{ x: parseInt(timearray[8]),y: parseInt(javaarray[8])},
		{ x: parseInt(timearray[9]),y: parseInt(javaarray[9])},
		{ x: parseInt(timearray[10]),y: parseInt(javaarray[10])},
		{ x: parseInt(timearray[11]),y: parseInt(javaarray[11])},
		{ x: parseInt(timearray[12]),y: parseInt(javaarray[12])}
		
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer1" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    myFunction1();
</script>
<br>
</body>
</html>

<?php
//###################################################################################
  $getinfo="SELECT * FROM mobile";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
        $id1 = $row->fbpostid;
	//$timestamp= $row->time;
	$name= $row->name;
        //echo $id1;
	


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
		 $result=json_decode($st,TRUE);
		 //echo "<pre>";
		 //var_dump($result);
		 //echo "</pre>";
		  $likes = $result['summary']['total_count'];
		
		 
		  $update = $con->query("UPDATE mobile SET fblike=$likes WHERE fbpostid=$id1");
		  if(!$update){
           die('Error:' . mysqli_error($con));
        }else{
            //echo "success";
        } 

		  
		  echo "</tr>";
		
		
		}
		}

		//#############################################################
		
		$array5=array();
   		$array6=array();




  $getinfo="SELECT * FROM mobile";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
          $id = $row->fbpostid;
	  $array5[]=$row->fblike;
          $timestamp=$row->time;
          $dt = DateTime::createFromFormat("Y-m-d H:i:s",$timestamp);
          $array6[] = $dt->format('H'); // '20'
	  //echo $dt->format('H');
	  echo '<br>';
          }
	 } 
?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
function myFunction2() {

var javaarray = new Array();

    <?php foreach($array5 as $val){ ?>
        javaarray.push('<?php echo $val; ?>');
    <?php } ?>

var timearray = new Array();
<?php foreach($array6 as $val1){ ?>
        timearray.push('<?php echo $val1; ?>');
	
    <?php } ?>

//var num = parseInt(htmlString);
var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Mobiles Facebook Analysis"
	},
	axisX:{
		title: "Time",
		includeZero: false
	},
	axisY:{
		title: "Likes",
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
		{ x: parseInt(timearray[0]),y: parseInt(javaarray[0])},
		{ x: parseInt(timearray[1]),y: parseInt(javaarray[1])},
		{ x: parseInt(timearray[2]),y: parseInt(javaarray[2])},
		{ x: parseInt(timearray[3]),y: parseInt(javaarray[3])},
		{ x: parseInt(timearray[4]),y: parseInt(javaarray[4])},
		{ x: parseInt(timearray[5]),y: parseInt(javaarray[5])},
		{ x: parseInt(timearray[6]),y: parseInt(javaarray[6])},
		{ x: parseInt(timearray[7]),y: parseInt(javaarray[7])},
		{ x: parseInt(timearray[8]),y: parseInt(javaarray[8])},
		{ x: parseInt(timearray[9]),y: parseInt(javaarray[9])},
		{ x: parseInt(timearray[10]),y: parseInt(javaarray[10])},
		{ x: parseInt(timearray[11]),y: parseInt(javaarray[11])},
		{ x: parseInt(timearray[12]),y: parseInt(javaarray[12])}
		
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    myFunction2();
</script>
</body>
</html>







<?php
} else {

	$loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/fbtimegraph.php', $permissions);
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
?>
</div>

</body>
</html>
