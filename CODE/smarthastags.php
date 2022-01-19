<html>
<body>
<h1>SMART HASHTAGS</h1>
<?php
$output = null; 

// $fileName = "sentimental.txt";
// //code to read line by line.
// $file = "darknet/objrecog.txt";
// $fp = @fopen($file,"r");
// if( $fp == false )
// {
//   echo ( "Error in opening file" );
//   exit();
// }
// /*
// while(!feof($fp))
// {
//   $string=fgets($fp);
// }
// */
// 
// 
// 
// $array = explode("\n", file_get_contents($file));
// 
// echo $array;
$output=shell_exec('/usr/bin/python2.7 /var/www/html/smarthash.py');
//sleep(15);

//file_put_contents($fileName, $output);

echo "<pre>$output</pre>";

?>
</body>
</html>
