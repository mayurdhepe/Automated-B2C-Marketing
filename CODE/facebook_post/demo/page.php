<?php
   // date_default_timezone_set('Asia/Calcutta');
    require "main.php";

    if(isset($_SESSION['token'])){
        
        $id = $_POST['pageid'];
        $message = $_POST['message'];
        $h = $_POST['hour'];
        $m = $_POST['minutes'];
        $s = $_POST['seconds'];
        $d = $_POST['date'];
        $month = $_POST['month'];
        $y = $_POST['year'];
        $H= (int)$h + 6;
        $res = $fb->get('/me/accounts', $_SESSION['token']);
        $res = $res->getDecodedBody();
        
        foreach($res['data'] as $page){
            if($page['id'] == $id){
                $accesstoken = $page['access_token'];
                break;
            }
        }
        
        $time = strtotime($month . '-' . $d . '-' . $y . ' ' . $H . ':' . $m . ':' . $s);
        //$local_time = Date('c',$timestamp);
		//$time=strtotime($local_time);	
        $data = array(
                'message' => $message,
                'scheduled_publish_time' => $time,
                'published' => 'false'
        );
        $res = $fb->post($id . '/feed/', $data, $accesstoken);
        header('Location: index.php');
        
    }


?>