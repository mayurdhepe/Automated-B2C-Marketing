<?php


echo "dfd";
$host     = "192.185.129.139";
$port     = 3306;
$socket   = "";
$user     = "globappq_cliq";
$password = "cliquser123";
$dbname   = "globappq_cliq";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());
if($con)
{
echo "connnection established";
}

$getinfo="SELECT * FROM promotions WHERE media = 'twitter' AND campaign = 'One Plus 5T' AND username = 'Mayur Dhepe'";
     if ($result1 = $con->query($getinfo)) {    
     while ($row = $result1->fetch_object()) 
	 {
      $id = $row->tweetid;
	  $name=$row->imgname;
	  $description = $row->description;
	  $time=$row->timestamp;
		$phpdate = strtotime( $time );
	$mysqldate = date( 'd-m-Y H:i:s', $phpdate );
echo $name;
}
}
?>
