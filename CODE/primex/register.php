<?php
  
   $dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_cliq';
        $dbPassword = 'cliquser123';
        $dbName     = 'globappq_cliq';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db1 = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);
        
        // Check connection
        if($db1->connect_error){
            die("Connection failed: " . $db1->connect_error);
        }
  
  $name=$_POST['fname'];
  $company=$_POST['company'];
  $email=$_POST['Email'];
  $password=$_POST['password'];
    
  $sql="INSERT INTO register(username,company,email,password)VALUES('$name','$company','$email','$password')";
  
  if(!mysqli_query($db1,$sql))
  {
    die('Error:' . mysqli_error($db1));
  }
  
  $sql1="INSERT INTO campaign(name,category,username)VALUES('Normal Posts','random','$name')";
  
  if(!mysqli_query($db1,$sql1))
  {
    die('Error:' . mysqli_error($db1));
  }
  mysqli_close($db1);
	echo "<script type='text/javascript'>alert('Registration Done!');</script>";
	
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <title>B2C Marketing</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/camera.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <script src="js/camera.js"></script>
    <script src="js/owl.carousel.js"></script>
    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
    <![endif]-->
    
   
	

	
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}


.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

</style>

</head>
<body>
<div class="page">
<!--========================================================
                          HEADER
=========================================================-->
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            <a href="index.html">
                                <img src="images/gse.jpg" style="width:150px;height:100px;" alt="logo">
                            </a>
                        </h1>
                    </div>
                    <nav class="nav put-right">
                        <ul class="sf-menu">
                            <li class="current"><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</</li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="register/index.html">Register</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--========================================================
                          CONTENT
=========================================================-->
<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - September08, 2014!</div>
<div class="camera-wrapper">
    <div id="camera" class="camera-wrap">
        <div data-src="images/ai1.jpg">
            <div class="fadeIn camera_caption">
                <h2 class="text_1 color_1">Marketing Competitor</h2>
                
            </div>
        </div>
        <div data-src="images/ai2.jpg">
            <div class="fadeIn camera_caption">
                <h2 class="text_1 color_1">Simplifying Modern Marketing</h2>
              
            </div>
        </div>
        <div data-src="images/ai4.jpg">
            <div class="fadeIn camera_caption">
                <h2 class="text_1 color_1">Delivering Exponential Results</h2>
               
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="preffix_2 grid_8">
                <h2 class="header_1 wrap_3 color_3">
                  </br>  SERVICES
            
                </h2>
            </div>
    <div class="row wrap_1 wrap_5">
    
        <div class="grid_3">
            <div class="box_1">
                
                <img src="images/A.png" style="width:150px;height:150px;" alt="logo">
                <h3 class="text_2 color_2 maxheight1">Autonomous Audience Targeting</h3>
                
              </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <img src="images/3.png" style="width:150px;height:150px;" alt="logo">
                <h3 class="text_2 color_2 maxheight1">Autonomous Media Buying</h3>
                
                </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <img src="images/5.png" style="width:150px;height:150px;" alt="logo">
                <h3 class="text_2 color_2 maxheight1">Cross Channel Execution</h3>
                
               </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <img src="images/6.png" style="width:150px;height:150px;" alt="logo">
                <h3 class="text_2 color_2 maxheight1">Testing and Optimization</h3>
                
                </div>
        </div>
    </div>
</div>

<div class="bg_1 wrap_2 wrap_4" style="background-color: black;">
    <div class="container">
        <div class="row">
            <div class="preffix_2 grid_8">
                <h2 class="header_1 wrap_3 color_3">
                    The Best Marketing Services, <br/>
                    Data & Analysis
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="grid_12">
                <div class="box_1" >
                    <p class="text_3" style="color:white;">
                       It’s a platform that enables companies and brands to manage and coordinate the entire advertising workflow, right from taking investment decisions, planning, audience targeting and cross channel execution and automate these activities based on previous experience and learning.
                    </p>
                    </br>
                    <a class="button button2" href="register/index.html"><b>GET STARTED</b></a>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container">
<div class="preffix_2 grid_8">
                <h2 class="header_1 wrap_3 color_3">
                  </br>  BENEFITS
            
                </h2>
            </div>
    <div class="row wrap_1 wrap_5">
        <div class="grid_3">
            <div class="box_1">
                <div class="icon_1"></div>
                <h3 class="text_2 color_2 maxheight1">Save Time And Money</h3>
                
                </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <div class="icon_2"></div>
                <h3 class="text_2 color_2 maxheight1">Increase And Accelerate Revenue</h3>
                
             </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <div class="icon_3"></div>
                <h3 class="text_2 color_2 maxheight1">Unique Experiences</h3>
               
                </div>
        </div>
        <div class="grid_3">
            <div class="box_1">
                <div class="icon_4"></div>
                <h3 class="text_2 color_2 maxheight1">Adding Intelligence to Your Marketing</h3>
               
               </div>
        </div>
         
    </div>
</div>




</section>
</div>
<!--========================================================
                          FOOTER
=========================================================-->
<footer class="footer-distributed">

			<div class="footer-left">

				 <h1>
                            <a href="index.html">
                                <img src="images/gse1.jpg" style="width:100px;height:80px;" alt="logo">
                            </a>
                        </h1>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">Global Super Elite </p>
			</div>

			<div class="footer-center">

				

				<div>
					<i class="fa fa-phone"></i>
					<p>+91 8983038009</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="elite@globalsuperelite.com">elite@globalsuperelite.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					Platform for AI B2C Marketing 
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>

<script src="js/script.js"></script>
</body>
</html>

