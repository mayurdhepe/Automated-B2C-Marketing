<?php
	require "main.php";
	 
	if (isset($_SESSION['token'])) {
	  try {
          
          $res = $fb->get('/me/accounts', $_SESSION['token']);
          $res = $res->getDecodedBody();
          
          foreach($res['data'] as $page){
              echo $page['id'] . " - " . $page['name'] . "<br>";
              
          }
          
          ?>
        
        <form method = "post" action = "page.php">
            <input type = "text" name = "pageid" placeholder = "Page ID">
            <input type = "text" name = "message" placeholder="Message">
            <input type = "text" name = "hour" placeholder="Hour">
            <input type = "text" name = "minutes" placeholder="Minutes">
            <input type = "text" name = "seconds" placeholder="Seconds">
            <input type = "text" name = "date" placeholder="Month">
            <input type = "text" name = "month" placeholder="Date">
            <input type = "text" name = "year" placeholder="Year">
            <input type = "submit">
        </form>

        <?php
          
	  } catch( Facebook\Exceptions\FacebookSDKException $e ) {
	    echo $e->getMessage();
	    exit;
	  }
	}
	else{
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_posts', 'manage_pages', 'publish_actions', 'publish_pages'];
		$callback    = 'http://cliq.globalsuperelite.com/facebook_post/demo/app.php';
		$loginUrl    = $helper->getLoginUrl($callback, $permissions);
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
?>