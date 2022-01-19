
<?php
ini_set("display_errors","1");

$min = 22;
$hour = 11;
$date = 31;
$month = 03;

$name1 = "bm3.jpg";

shell_exec('echo "'.$min.' '.$hour.' '.$date.' 0'.$month.' * python /var/www/html/fbpage3.py '.$name1.'" >> /var/www/html/cron_job.txt');

shell_exec('sudo cp /var/www/html/cron_job.txt /var/spool/cron/crontabs/root');
?>
