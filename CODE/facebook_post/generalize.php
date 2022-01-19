<?php
	require_once __DIR__ . '/vendor/autoload.php';
	session_start();
	$fb = new Facebook\Facebook([
	  'app_id'                => '198297070745933',
	  'app_secret'            => 'd3b43710b1965c0ab2be4b54af85f247',
	  'default_graph_version' => 'v2.11',
	]);
	 
	if (isset($_SESSION['token'])) {
	  try {
          
          $res = $fb->get('/me/accounts', $_SESSION['token']);
          $res = $res->getDecodedBody();
          
          foreach($res['data'] as $page){
              echo $page['id'] . " - " . $page['name'] . "<br>";
              
          }
		  echo "<form action= 'genfbit.php' method = 'post' id= 'posting'>  
          <input type = 'text' name = 'page' placeholder='Page NO'>
		  <input type = 'submit' name='POST' id='xyz'>";
		  } 
		  
		  catch( Facebook\Exceptions\FacebookSDKException $e ) {
	    echo $e->getMessage();
	    exit;
	  }
	}
	else{
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_posts', 'manage_pages', 'publish_actions', 'publish_pages'];
		$callback    = 'http://cliq.globalsuperelite.com/facebook_post/generalize.php';
		$loginUrl    = $helper->getLoginUrl($callback, $permissions);
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
          ?>