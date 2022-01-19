<?php
ini_set('display_errors', '1');
//$description = "NOPE34";
$name1 = "img4.jpg";

shell_exec('/usr/bin/python2.7 /var/www/html/tweet.py '.$name1);

?>