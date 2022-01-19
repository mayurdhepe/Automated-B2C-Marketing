<?php 
include '../thirdTask-master/updatefav.php';
$host     = "192.185.129.139";
$port     = 3306;
$socket   = "";
$user     = "globappq_cliq";
$password = "cliquser123";
$dbname   = "globappq_cliq";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error()); 
  $array1=array();
  $array2=array();
  $getinfo="SELECT * FROM twitterdata where cat='Valentine'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->tpostid;
	  $array1[]=$row->tfav;
	  $timestamp= $row->time;
	  $dt = DateTime::createFromFormat("Y-m-d H:i:s",$timestamp);
          $array2[] = $dt->format('H'); // '20'
	 }
	 } 
	  
  ?>
<!DOCTYPE HTML>
<html>
<head>  
<h1>Twitter Time Vs Likes Graphs<h1>
<br>
<script>
function myFunction()  {

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
		text: "Twitter Valentine Analysis"
	}, 
	
	axisY:{
		title: "Favorites",
		includeZero: false
	},
	axisX:{
		title: "Time",
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
$array3=array();
$array4=array();
  $getinfo="SELECT * FROM twitterdata where cat='Winter'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->tpostid;
	  $array3[]=$row->tfav;
	  $timestamp= $row->time;
	  $dt = DateTime::createFromFormat("Y-m-d H:i:s",$timestamp);
          $array4[] = $dt->format('H'); // '20'
	 }
	 } 
	  
  ?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
function myFunction1()  {

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
		text: "Twitter Winter Analysis"
	}, 
	
	axisY:{
		title: "Favorites",
		includeZero: false
	},
	axisX:{
		title: "Time",
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
$array5=array();
$array6=array();
  $getinfo="SELECT * FROM twitterdata where cat='mobile'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->tpostid;
	  $array5[]=$row->tfav;
	  $timestamp= $row->time;
	  $dt = DateTime::createFromFormat("Y-m-d H:i:s",$timestamp);
          $array6[] = $dt->format('H'); // '20'
	 }
	 } 
	  
  ?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
function myFunction2()  {

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
		text: "Twitter Mobiles Analysis"
	}, 
	
	axisY:{
		title: "Favorites",
		includeZero: false
	},
	axisX:{
		title: "Time",
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


