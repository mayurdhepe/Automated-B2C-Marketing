<html>
<body>

<?php
		
		$cat = 'Valentine';

if($cat== 'Valentine')
	$id= "1018100471664542";
if($cat== 'Winter')
	$id= "312326849275479";
if($cat== 'mobile')
	$id= "566617473674767";

$dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_cliq';
        $dbPassword = 'cliquser123';
        $dbName     = 'globappq_cliq';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
		
		$choose="SELECT * from trainfb WHERE cat='$cat'";
				if ($result = $db->query($choose)) {    
     while ($row = $result->fetch_object()) 
	 {
        $id1 = $row->counter;
	 }
				}	 
	
	
		mysqli_close($db);
		
		$dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_ngouser';
        $dbPassword = 'ngouser123';
        $dbName     = 'globappq_ngo';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db1 = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);
        
        // Check connection
        if($db1->connect_error){
            die("Connection failed: " . $db1->connect_error);
        }
		
		$maxid1="SELECT * from $cat WHERE id=$id1";
				if ($result = $db1->query($maxid1)) {    
     while ($row = $result->fetch_object()) 
	 {
        $maxid = $row->id;
		$img = $row->imglink;
		$website = $row->WebsiteName;
		$category = $row->Category;
		$title = $row->Title;
		$price = $row->Price;
		$discount = $row->discount;
		 echo $maxid;
		 echo '<br>';
		echo $img;
		echo '<br>';
		 echo $title;
	 }
				}
				
	mysqli_close($db1);
	
	
	$dbHost     = '192.185.129.139';
        $dbUsername = 'globappq_cliq';
        $dbPassword = 'cliquser123';
        $dbName     = 'globappq_cliq';
		$port     = 3306;
		$socket   = "";
        
        //Create connection and select DB
        $db2 = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,$port, $socket);
        
        // Check connection
        if($db2->connect_error){
            die("Connection failed: " . $db2->connect_error);
        }
		
		$name = basename($img);
	$newline= ' ';
	$web='Website : ';
	$pr='Price: ';
	$at=' at ';
	$per='%';
	$disc=' discount!! ';
	$rs='Rs';
	$message = $title.$newline.$pr.$rs.$price.$newline.$at.$discount.$per.$disc.$newline.$web.$website;
	file_put_contents("/home/globappq/public_html/cliq/trainingimages/$name", file_get_contents($img));
	echo '<br>';
	echo $name; 
	$j=1;
		date_default_timezone_set('Asia/Kolkata');
		echo 'Current TimeStamp is:  ';
		echo date('Y-m-d H:i');
		$timestamp = date('Y-m-d H:i');
	//$hashtag = "Sleepy,Dopey,Sneezy,Happy,Grumpy,Doc,Bashful";
	 $sql = $db2->query("INSERT INTO valentine(description,name,social,time,fbpostid)VALUES('$message','$name','$j','$timestamp','$fbpostid')");
	if(!$sql){
           die('Error:' . mysqli_error($db2));
        }else{
            echo "success";
        } 
		$id1++;
		$update = $db2->query("UPDATE trainfb SET counter=$id1 WHERE cat='$cat'");
		  if(!$update){
           die('Error:' . mysqli_error($db2));
        }else{
            echo "success";
        } 
		mysqli_close($db2);
		
	 
	 
	 echo "<form action='#' method='post'>
	<img src= 'http://cliq.globalsuperelite.com/trainingimages/$name' alt='Smiley face' height='200' width='200'>
	<br><br>
  Enter Keyword related to image: <input type='text' name='key'><br>
  
  <a href='../textapi/src/AYLIEN/TextAPI.php' target='target'>Get Suggested hashtags</a>
 <iframe name='target'></iframe>
</form> ";
//include_once '../textapi/src/AYLIEN/TextAPI.php';
$key= $_POST['key'];
echo '<br>';
echo $name;

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
		
		
?>

</body>
</html>
