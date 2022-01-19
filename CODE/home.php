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
  <li class="active"> <a href="#"><i class="icon icon-bar-chart"></i> <span>Normal Post</span></a> </li>
   
    <li> <a href="existcamp.php"><i class="icon icon-bar-chart"></i> <span>HOME</span></a> </li>
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
$cname = 'Normal Posts';
?>
<h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Category:  <?php echo $cname;?><h3>


    <!--Post window-->
   <form name="postdetails" id="post" method="post" action="posting.php" enctype="multipart/form-data">
    <div class="row-fluid" style="margin-left: 25%; margin-bottom: 10px">
      <div class="widget-box span6" style="box-shadow:0px 10px 20px darkgray; ">
        <div class="widget-title bg_lg" style="padding-left: 10px; padding-top: 5px;">
            &nbsp;
            &nbsp;
            


            <input type="checkbox" name="choice[]" value="facebook">           
            &nbsp;
           <button  class="btn btn-primary btn-circle"><i class="icon-facebook"></i></button> 
         
   
            &nbsp;
            <input type="checkbox" name="choice[]" value="instagram">
            &nbsp;
            <button  class="btn btn-primary btn-circle"><i class="icon-instagram"></i></button>
            &nbsp;
           
           
            
            
            <input type="checkbox" name="choice[]" value="twitter">
            &nbsp;
            <button  class="btn btn-primary btn-circle"><i class="icon-twitter"></i></button>
          
            
            &nbsp;
            <input type="checkbox" name="choice[]" value="linkedin">
            &nbsp;
            <button  class="btn btn-primary btn-circle"><i class="icon-linkedin"></i></button>
            &nbsp;
        </div>
        <div class="widget-content" style="padding: 0">
            <div class="row-fluid">
              
<!-- Begin -->

<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
			<span class = "current-value">0%</span>
		</div>
	</div>
	<div class = "form-group">
		<textarea class = "form-control" rows = "4" maxlength = "300" placeholder = "Write something here" name="desc"></textarea>
		<input type="hidden" name="camp" value="<?php echo "$cname";?>">
	</div>
	
	<div class = "count btn btn-primary" style="float: right;">300</div>


<!-- End -->
       <img id="blah" src="#" alt="" />
		   </div>
            <div class="row-fluid">
			
               
                
				
        <div class = "form-group">
		<textarea class = "form-control" rows = "4" maxlength = "300" placeholder = "Write something here" name="key" id="key"></textarea>
		
	</div>

<label class="btn btn-primary btn-file" style="margin:5px; border-radius: 5px; "><i class="icon-camera"></i>
                    Photo/Video<input type="file" name="image" id="image" style="display: none;" onchange="readURL(this);">
                </label>


				<br>
				<div id="div2"></div>
				<div id="div3"></div>
				<div id="div4"></div>
                
				<input  type="button" class = "btn-primary" id="btnok" onclick="addbutton();" value="Get Popular Hashtags" />
				<br /> 
				
				<script type="text/javascript">
					function addbutton()
							{
							var div1=document.getElementById("div2");
							var div5=document.getElementById("div3");
							var div6=document.getElementById("div4");

							div1.innerHTML="<input type='checkbox' id='btnok' name= 'choice2[]' value='#bmw'><b><i> #hashtag1</i></b></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' id='btnok' name= 'choice2[]' value='#bmw'><b><i> #hashtag2</i></b></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' id='btnok' name= 'choice2[]' value='#bmw'><b><i> #hashtag3</i></b></input>";
							div5.innerHTML="<input type='checkbox' id='btnok' name= 'choice2[]' value='#luxurycars'><b><i> #hashtag4</i></b></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' id='btnok' name= 'choice2[]' value='#bmw'><b><i> #hashtag5</i></b></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' id='btnok' name= 'choice2[]' value='#bmw'><b><i> #hashtag6</i></b></input>";
							div6.innerHTML="<input type='checkbox' id='btnok' name= 'choice2[]' value='#BMW7series'><b><i> #hashtag7</i></b></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' id='btnok' name= 'choice2[]' value='#bmw'><b><i> #hashtag8</i></b></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' id='btnok' name= 'choice2[]' value='#bmw'><b><i> #hashtag9</i></b></input>";	
var keyword = document.getElementById('key').value; 

 
            

                var connection = new ActiveXObject("ADODB.Connection");

                var connectionstring = "Data Source=.;Initial Catalog=EmpDetail;Persist Security Info=True;User ID=sa;Password=****;Provider=SQLOLEDB";

                connection.Open(connectionstring);

                var rs = new ActiveXObject("ADODB.Recordset");

                rs.Open("insert into textapi values('" + keyword + "')", connection);

                alert("Insert Record Successfuly");

                

                connection.close();

            }

					/* var mysql = require('mysql');

var con = mysql.createConnection({
  host: "192.185.129.139",
  user: "globappq_cliq",
  password: "cliquser123",
  database: "globappq_cliq"
});

con.connect(function(err) {
  if (err) throw err;
  document.write("Connected!");
  var sql = "INSERT INTO textapi (key) VALUES (keyword)";
  con.query(sql, function (err, result) {
    if (err) throw err;
    document.write("1 record inserted");
  });
});			 */
						}
				
</script>
				
	
				<label class="btn btn-primary btn-file" style="margin:5px; border-radius: 5px; ">
                    POST<input type="submit" name="submit" id="submit" style="display: none;">
                </label>
					
					
					</form>
						
					<div class="btn-group" style="float: right;">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" style="border-radius: 5px; margin: 5px"><i class="fa fa-paper-plane" aria-hidden="true"></i> Schedule <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href= "../facebook_ads/index.php">Facebook</a></li>
						<li><a href= "">Twitter</a></li>
						<li><a href= "">Google+</a></li>
                        <!--<li><input type="submit" name="post_boost" value="Post and Boost" ></li> -->
						<a href="boost.php">Boost and Post</a>
                    </ul>

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
