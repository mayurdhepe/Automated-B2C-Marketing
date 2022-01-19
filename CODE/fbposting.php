<?php
ini_set('display_errors', '1');
//$description = "NOPE34";
$name1 = "op3.jpg";

$output=shell_exec('/usr/bin/python2.7 /var/www/html/fbpage.py '.$name1);
echo $output;
//echo "07 15 28 03 * python /var/www/html/fbpage.py m1.jpg" >> /var/spool/cron/crontabs/root


?>