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
input[type=button] {
   background-color: #ADD8E6;
    border-radius: 50%;
    color: black;
    padding: 8px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
jQuery(document).ready(function() {
	
	$('textarea').keyup(function() {
		var box = $(this).val();     //
		var main = box.length * 300;    //100
		var value = (main / 300);		 //100
		var count = 0 + (box.length );
		var reverse_count = 300 - box.length;		 //100
		
		if(box.length >= 0){
			$('.progress-bar').css('width', Math.floor((count/3)) + '%');
			$('.current-value').text(Math.floor(count/3) + '%');
			$('.count').text(reverse_count);
			if(count >=0 && count <20 || count >200){    //red
 				$('.progress-bar').removeClass('progress-bar-danger');
				$('.progress-bar').removeClass('progress-bar-warning');			
				$('.progress-bar').removeClass('progress-bar-success')
				
				$('.progress-bar').addClass('progress-bar-danger');
				}			

			if(count >=20 && count <50 || count >=140 && count <=200){    //orange
 				$('.progress-bar').removeClass('progress-bar-danger');
				$('.progress-bar').removeClass('progress-bar-warning');			
				$('.progress-bar').removeClass('progress-bar-success');
				

				$('.progress-bar').addClass('progress-bar-warning');
				}			
			
			
			if(count >=50 && count <140 ){    //green
 				$('.progress-bar').removeClass('progress-bar-danger');
				$('.progress-bar').removeClass('progress-bar-warning');			
				$('.progress-bar').removeClass('progress-bar-success');
				
				$('.progress-bar').addClass('progress-bar-success')
				}			
/*


			if(count >=20 && count <50 || count >=140 && count <=200){    //orange
 				$('.progress-bar').removeClass('progress-bar-danger');
				$('.progress-bar').removeClass('progress-bar-warning');			
				$('.progress-bar').removeClass('progress-bar-success');
				

				$('.progress-bar').addClass('progress-bar-warning');
				}			



			if (count >= 50 && count < 85){
				$('.progress-bar').removeClass('progress-bar-danger').addClass('progress-bar-warning');
			}
			if (count > 85){
				$('.progress-bar').removeClass('progress-bar-warning').addClass('progress-bar-danger');
			}
			if(count >= 0 && count < 50){
				$('.progress-bar').removeClass('progress-bar-danger');
				$('.progress-bar').removeClass('progress-bar-warning');			
				$('.progress-bar').addClass('progress-bar-success')
			}
		*/	
		}
		return false;
	});
});
	</script>

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
  <li class="active"> <a href="#"><i class="icon icon-bar-chart"></i> <span>Schedule Post</span></a> </li>
	<li><a href="existcamp.php"><i class="icon icon-home"></i> <span>HOME</span></a> </li>
	<li> <a href="createcamp.php"><i class="icon icon-home"></i> <span>Create Campaign</span></a> </li>
    <li> <a href="content.php"><i class="icon icon-bar-chart"></i> <span>Normal Post</span></a> </li>
    
    <li> <a href="schedule.php"><i class="icon icon-bar-chart"></i> <span>Set Reminder</span></a> </li>
    <li><a href="boostpost.php"><i class="icon icon-rss"></i> <span>Boost Post</span></a></li>
    <li class="submenu"> <a href="analysis.php"><i class="icon icon-th-list"></i> <span>Analysis</span></a></li>
      
  </ul>
</div>
<!--sidebar-menu-->




<!--main-container-part-->
<div id="content"  style="margin-bottom: 10px ">
<!--breadcrumbs-->
  
<br><br><br><br><br><br>
<?php
$cname = $_POST['campaigns'];
?>
<h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Category:  <?php echo $cname;?><h3>


    <!--Post window-->
   <form name="postdetails" id="post" method="post" action="../darknet/objrec3.php" enctype="multipart/form-data">
    <div class="row-fluid" style="margin-left: 25%; margin-bottom: 10px">
      <div class="widget-box span6" style="box-shadow:0px 10px 20px darkgray; ">
        <div class="widget-title bg_lg" style="padding-left: 10px; padding-top: 5px;">
            &nbsp;
            &nbsp;
            


            
        </div>
        <div class="widget-content" style="padding: 0">
            <div class="row-fluid">
              
<!-- Begin -->


	
	

<label><b>Select image to Post:</b></label>
<!-- End -->
       <img id="blah" src="#" alt="" />
		   </div>
            <div class="row-fluid">
            
               
                
			
	
        
<label class="btn btn-primary btn-file" style="margin:5px; border-radius: 5px; "><i class="icon-camera"></i>
                    Photo/Video<input type="file" name="image" id="image" style="display: none;" onchange="readURL(this);">
                </label>

<br>
				<input type="hidden" name="camp" value="<?php echo "$cname";?>">
	
				<label class="btn btn-primary btn-file" style="margin:5px; border-radius: 5px; ">
                    Get Keywords<input type="submit" name="submit" id="submit" style="display: none;">
                </label>
					
					
					</form>
						
					
				
				
                </div> 
				<script>
			function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
		

</script>
</script>
            </div>
	 
        </div>
      </div>
 </div>

</body>
</html>
