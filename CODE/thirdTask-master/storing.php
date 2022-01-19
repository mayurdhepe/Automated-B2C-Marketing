<?php

$message = "hii";
$name = "xyz.jpg";
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
		$j=1;
		date_default_timezone_set('Asia/Kolkata');
		echo 'Current TimeStamp is:  ';
		echo date('Y-m-d H:i');
		$timestamp = date('Y-m-d H:i');
	  $sql = $db2->query("INSERT INTO '$cat'(description,name,social,time)VALUES('$message','$name','$j','$timestamp')");
         //$sql= "INSERT INTO '$cat'(desc,name,social,time)VALUES('$message','$name','$j','$timestamp')";

if(!$sql){
           die('Error:' . mysqli_error($db2));
        }else{
            echo "success";
        } 
?>