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

input[type=radio] {
  position: absolute;
  visibility: hidden;
  display: none;
}

input[type=radio]:checked + label{
  color: lighten($bg,60%);
  background: $fg;
}

label + input[type=radio] + label {
  border-left: solid $borderWidth $fg;
}
.radio-group {
  border: solid $borderWidth $fg;
  display: inline-block;
  margin: 20px;
  border-radius: 10px;
  overflow: hidden;
}

@import url('https://fonts.googleapis.com/css?family=Roboto');
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

<!--Header-part-->
<div id="header">
  <h1><a href="#">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    
    
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->


<!--start-top-search-->

<!--close-top-search-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
	<li class="active"><a href="#"><i class="icon icon-home"></i> <span>HOME</span></a> </li>
	<li> <a href="createcamp.php"><i class="icon icon-home"></i> <span>Create Campaign</span></a> </li>
    <li> <a href="home.php"><i class="icon icon-bar-chart"></i> <span>Normal Post</span></a> </li>
    <li><a href="boostpost.php"><i class="icon icon-rss"></i> <span>Boost Post</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Analysis</span></a></li>
      
  </ul>
</div>
<!--sidebar-menu-->




<!--main-container-part-->
<div id="content"  style="margin-bottom: 10px ">
<!--breadcrumbs-->
  
<br>

    <!--Post window-->
   <form name="postdetails" id="post" method="post" action="camppost.php" enctype="multipart/form-data">
    <div class="row-fluid" style="margin-left: 25%; margin-bottom: 10px">
       <div class="widget-box span6" style="box-shadow:0px 10px 20px darkgray; "> 
         
              
<!-- Begin -->

	
	<h3><b>Create Audience:</b></h3>
	<br>
	<label><b>Name:</b></label>
                    
					<div class = "form-group">
		<textarea class = "form-control" rows = "1" maxlength = "300" placeholder = "Enter Audience Name" name="name"></textarea>
	</div>
	<br>
	<label><b>Gender:</b></label>
	<div class="radio-group">
<input type="radio" id="option-one" name="selector"><label for="option-one">All</label>
<input type="radio" id="option-two" name="selector"><label for="option-two">Men</label>
<input type="radio" id="option-three" name="selector"><label for="option-three">Women</label>
  </div>
  <br>
	<label><b>Age Range:</b></label>
	
					<select name="age">
					<?php $age = 15; 

					while($age <= 65) {?>
					
                        <li><option value="<?php $age?>"><?php $age?></option></li>
						<?php $age++;
					}?>
					<label><b> - </b></label>
					<select name="age">
					<?php $age = 15; 

					while($age <= 65) {?>
					
                        <li><option value="<?php $age?>"><?php $age?></option></li>
						<?php $age++;
					}?>
						
						
						</select>
                    <br>
					
					<label><b>Location:</b></label>
                    
					<div class = "form-group">
		<textarea class = "form-control" rows = "1" maxlength = "300" placeholder = "Enter Location" name="location"></textarea>
	</div>
	
	<br>
					
					<label><b>INCLUDE people that match:</b></label>
                    
					<div class = "form-group">
		<textarea class = "form-control" rows = "1" maxlength = "300" placeholder = "Add Demographics, Interests or Behaviours" name="include"></textarea>
	</div>
	
	<br>
					
					<label><b>EXCLUDE people that match:</b></label>
                    
					<div class = "form-group">
		<textarea class = "form-control" rows = "1" maxlength = "300" placeholder = "Add Demographics, Interests or Behaviours" name="exclude"></textarea>
	</div>
		<br>
		
		<label><b>Total Budget (INR):</b></label>
		<br>
		<input type="number" name="quantity" min="65">
		<br>
	<label><b>Ad Duration:</b></label>
	<div class="radio-group">
<input type="radio" id="option-one" name="selector"><label for="option-one">1 day</label>
<input type="radio" id="option-two" name="selector"><label for="option-two">7 days</label>
<input type="radio" id="option-three" name="selector"><label for="option-three">14 days</label>
  </div>
  <br>
	
	<label class="btn btn-primary btn-file" style="margin:5px; border-radius: 5px; ">
                    BOOST NOW!<input type="submit" name="selectcamp" id="camp" style="display: none;">
                </label>
				
	</form>
						
			
                </div> 
				
            </div>
	 
        </div>
      </div>
 </div>
<!-- <div class="adjustment">
<div id="user-nav" class="navbar navbar-inverse">
  
<ul1>
  
  <li1 class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Social Media</a>
    <div class="dropdown-content">
      <a href="#">Facebook</a>
      <a href="#">Twitter</a>
      <a href="#">LinkedIn</a>
      <a href="#">Google+</a>
    </div>
  </li1>
  <li1 class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Date</a>
    <div class="dropdown-content">
      <input type="date" name="bday">
    </div>
  </li1>
</ul1>


</div>

    
       
<br><br><br><br><br><br>


    <div class="span5" style=" margin-left:5px; margin-bottom: 10px; position: absolute">
        <div class="widget-box span6">
           
            <div class="widget-content">
		<img src="zara.jpeg" alt="Smiley face" height="200" width="200">
            <label><h4>50% off on Zara clothing</h4></label></div>


        
        
           
            <div class="widget-content">
		 <img src="adidas.jpg" alt="Smiley face" height="200" width="200">
            <label><h4>Adidas shoes @ Rs999</h4> </label></div>


        
   
            
            <div class="widget-content">
		 <img src="fast1.jpeg" alt="Smiley face" height="200" width="200">
            <label><h4>40% off on Fastrack products!! </h4></label></div>


      
   

        
            
            <div class="widget-content">
		<img src="vogue.jpg" alt="Smiley face" height="200" width="200">
            <label><h4>Vogue glasses at best price! </h4></label></div>


        
    
            
            <div class="widget-content">
		<img src="vogue.jpg" alt="Smiley face" height="200" width="200">
            <label><h4>Vogue glasses at best price! </h4></label></div>

        
       
            
            <div class="widget-content">
		<img src="vogue.jpg" alt="Smiley face" height="200" width="200">
            <label><h4>Vogue glasses at best price! </h4></label></div>

</div>
        
    </div>
</div>
</div>
 -->
</body>
</html>
