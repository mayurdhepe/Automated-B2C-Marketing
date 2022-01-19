<?php
 session_start();
  $name=$_SESSION["name"];

  $category = $_POST['category'];
  $media = $_POST['media'];
    


ini_set('display_errors','1');

$host     = "192.185.129.139";
$port     = 3306;
$socket   = "";
$user     = "globappq_cliq";
$password = "cliquser123";
$dbname   = "globappq_cliq";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());

  



//################  FETCH SENTI ###########################

$pos=0;
$neg=0;
$neut=0;
$tot=0;
$posp=0.0;
$negp=0.0;
$neutp=0.0;

$getinfo="SELECT * FROM promotions WHERE media = 'facebook' AND campaign = '$category' AND username = '$name'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->fbpostid;
	
	  $name1=$row->imgname;
	  $description = $row->description;
	  $time=$row->timestamp;
		$phpdate = strtotime( $time );
		$postid = $row->fbpostid;
		$senti = $row->senti;
	$mysqldate = date( 'd-m-Y H:i:s', $phpdate );
	
	if($senti == 'Positive')
	{
            $pos++;
	}
	else if($senti == 'Negative')
	{
            $neg++;
	}
	else if($senti == 'Neutral')
	{
            $neut++;
	}
	
	
	
	$tot++;
        } //endofwhile
	 }
	 
	$posp = ($pos/$tot)*100;
	$negp = ($neg/$tot)*100;
	$neutp = ($neut/$tot)*100;


?>

<!DOCTYPE HTML>
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
    max-width: 1300px;
    margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
    content: '';
    position: absolute;
    width: 0px;
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
    left: 39px;
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

<script>
function myFunction() {

var javaarray = new Array();
<?php

$array1 = array();
$array1[0]=(float)$posp;
$array1[1]=(float)$negp;
$array1[2]=(float)$neutp;

?>

 <?php foreach($array1 as $val){ ?>
        javaarray.push('<?php echo $val; ?>');
    <?php } ?>
    
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: javaarray[0], label: "Positive"},
			{y: javaarray[1], label: "Negative"},
			{y: javaarray[2], label: "Neutral"}
// 			{y: 80, label: "Positive"},
// 			{y: 19, label: "Negative"},
// 			{y: 1, label: "Neutral"}
		]
	}]
});
chart.render();

}
</script>
</head>

<body>


<div class="sidenav">
	<label><font color="white">Welcome :<br><?php echo $name;?></font></label>
  <a href="existcamp.php">HOME</a>
  <a href="analysis.php">Analysis</a>
  <a href="../primex/logout.php">Logout</a>
  </div>
	<h3><font color="white">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Campaign :  <?php echo $category;?></font></h3>
  

<div class="timeline">
	<div class="container left">
    <div class="content">
      
	<br>
	
     <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
    
    <script type="text/javascript">
    myFunction();
</script>
      <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Sentimental Analysis"; ?></b></p>
	  <br>
	  
    </div>
  </div>
  	 
	 
</div>



</body>
</html>
