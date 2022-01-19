<!DOCTYPE html>
<html lang="en">

<title>Home page</title>
<head>
<style>
ul ul1{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li li1{
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li1.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.adjustment
{
position: relative;
    top: 0px;
    right: 20px;

}
</style>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	
	
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/buttons.css"/>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>
<body>
<?php
 session_start();
  $name=$_SESSION["name"];
?>
<!--Header-part-->
<div id="header">
  <h1><a href="#">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $name;?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        
        <li class="divider"></li>
        <li><a href="../primex/logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    
    
    <li class=""><a title="" href="../primex/logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->


<!--start-top-search-->

<!--close-top-search-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
	<li class="active"><a href="#"><i class="icon icon-rss"></i> <span>What's TRENDING??</span></a></li>
	<li><a href="existcamp.php"><i class="icon icon-home"></i> <span>HOME</span></a> </li>
      
  </ul>
</div>
<!--sidebar-menu-->




<!--main-container-part-->
<div id="content"  style="margin-bottom: 10px ">
<!--breadcrumbs-->
  
<br><br>


    <!--Post window-->
   
    <!--<div class="row-fluid" style="margin-left: 25%; margin-bottom: 10px">-->
       
         
              
<!-- Begin -->

	<?php
	ini_set('display_errors','1');
	$keyword = $_POST['keyword'];
	echo "<h2>News Related to : </h2>";
	echo "<h2>". $keyword. "</h2>";
	shell_exec('/usr/bin/python2.7 /var/www/html/newsapi3.py '.$keyword);
	sleep(1);
	
	$file = "/var/www/html/trends.txt";
$fp = @fopen($file,"r");
if( $fp == false )
{
  echo ( "Error in opening file" );
  exit();
}
echo "\n\n\n";
while(!feof($fp))
{
    
  $string=fgets($fp);
  echo "<pre>$string</pre>";	
   echo "<pre>\n\n</pre>";
}

echo "\n\n\n";
	?>
	
	
		
                        
						
						
	
				
	
	
	
	<br>
	
		
	
						
			
                <!--</div> -->
				
            </div>
	 
        </div>
      
 </div>
</body>
</html>
