<?php
  session_start();
  $dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_cliq';
        $dbPassword = 'cliquser123';
        $dbName     = 'globappq_cliq';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db1 = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);
  
  $name=$_POST['name'];
  $password=$_POST['password'];
    
   
  $sql="SELECT * FROM register WHERE username='$name' and password='$password'";
   
  
  if(!mysqli_query($db1,$sql))
  {
    die('Error:' . mysqli_error($db1));
  }

  $result=mysqli_query($db1,$sql);

  $count=mysqli_num_rows($result);
     
if($count==1)
{
  $_SESSION["name"]=$name;
  header("Location: ../thirdTask-master/existcamp.php");
}
else
{
  
  
  echo '<script type="text/javascript">';
        echo 'alert("Login Failed!")';
        echo '</script>';
}
    
  mysqli_close($db1);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


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
    
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


    <style>
        input {
            border: none;
            border-bottom: 1px solid black;
        }
        input:focus {
            border-bottom: 1px solid blue;
            outline: none;
        }

        .floating-label {
            position: absolute;
            pointer-events: none;
            left: 20px;
            top: 18px;
            transition: 0.2s ease all;
        }

	a {
    color: white;
}
	body
{
	background-color : #129894;
}

	.footerpos
	{
	position: absolute;
    bottom: 20px;
    right: 0;
    width: 1350px;
    height: 10px;
	}
    </style>

</head>
<body>

    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
        <!--<div class="container-fluid">-->

            <!--&lt;!&ndash;logo&ndash;&gt;-->
            <!--<div class="navbar-header">-->
                <!--<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainNavBar">-->
                    <!--<span class="navbar-toggler-icon"></span>-->
                <!--</button>-->
                <!--<a href="#" class="navbar-brand">OHTARI</a>-->
            <!--</div>-->

            <!--&lt;!&ndash;Menu items&ndash;&gt;-->
            <!--<div class="collapse navbar-collapse" id="mainNavBar">-->
                <!--<ul class="nav navbar-nav">-->
                    <!--<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>-->
                    <!--<li class="nav-item"><a class="nav-link" href="#">About</a></li>-->
                    <!--<li class="nav-item"><a class="nav-link" href="#">Content</a></li>-->
                <!--</ul>-->
            <!--</div>-->

        <!--</div>-->
    <!--</nav>-->
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            
							<a href="index.html">
                                <img src="images/b2c.jpg" style="width:150px;height:100px;" alt="logo">
                            </a>
                        </h1>
                    </div>
                    <nav class="nav put-right">
                        <ul class="sf-menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</</li>
                            <li><a href="services.html">Services</a></li>
                            <li class="current"><a href="#">Login</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>



    <div class="row">
        <div class="col-md-4" style="position:absolute; left: 33.33%; top: 10%;">
            <div class="card">

                <img class="card-img-top" src="images/aijam.png" alt="Card Image cap">
                <!--Card header-->
                <!--<div class="card-header">-->
                    <!--<h2>Log In</h2>-->
                <!--</div>-->

                <!--Card body-->
                <div class="card-body">
                    <h3 class="card-title">Log In</h3>
                    <form role="form" action="login.php" method="post">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name" style="width: 100%; padding-top: 10px; margin-bottom: 10px;" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" style="width: 100%; padding-top: 10px; margin-bottom: 10px;" required>
                        </div>
                        <button class="btn btn-success" style="margin-right: 10px; margin-bottom: 10px; margin-top: 10px;">Log In</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footerpos">
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

</div>
</body>
</html>


