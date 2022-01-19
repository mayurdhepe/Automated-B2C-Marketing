<?php

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
		
$insertm = $db->query("INSERT into fbimg (desc, name) VALUES ('john', 'mon.jpg')");
        if($insertm){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        }  

?>