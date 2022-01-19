<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php'; // download official fb sdk for php @ https://github.com/facebook/php-graph-sdk
$fb = new Facebook\Facebook([
    'app_id' => '198297070745933',
    'app_secret' => 'd3b43710b1965c0ab2be4b54af85f247',
    'default_graph_version' => 'v2.11',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['manage_pages', 'publish_pages']; // optional
try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        // getting short-lived access token
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
//        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
//        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        // setting default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    // redirect the user back to the same page if it has "code" GET variable
    if (isset($_GET['code'])) {
        header('Location:./');
    }
    // getting basic info about user
    try {
        $profile_request = $fb->get('/me');
        $profile = $profile_request->getGraphNode()->asArray();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // redirecting user back to app login page
        header("Location:./");
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    // post on behalf of page
    $pages = $fb->get('/me/accounts');
    $pages = $pages->getGraphEdge()->asArray();

    if(isset($_POST['upload']))
    {
        $target = "upload/";
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($_FILES['file']['tmp_name']);
        if(!in_array($detectedType, $allowedTypes))
        {
            $message = "Invalid File.";
        }
        else
        {
            $target = $target . basename( $_FILES['file']['name']) ;
            if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
            {
                try
                {
                    $image['access_token']  = $_SESSION['token'];
                    $image['message']       = 'Upload this image using www.phpgang.com tutorial demo!!';
                    $image['image']         = '@'.realpath("upload/".$_FILES['file']['name']);
                    $facebook->setFileUploadSupport(true);
                    $img = $facebook->api('/me/photos', 'POST', $image);
                    $message = "Image Uploaded on facebook <a href='https://www.facebook.com/photo.php?fbid=10202356836865359".$img['id']."' target='_blank'>Click Here</a> to view!!";
                }
                catch(FacebookApiException $e)
                {
                    $message = "Sorry, there was a problem uploading your file please try again.";
                }
            }
            else
            {
                $message = "Sorry, there was a problem uploading your file please try again.";
            }
        }
        $content = '
    <style>
    #form
    {
        margin-left:auto;
        margin-right:auto;
        width: 220px;
    }
    </style>
    
    <form action="index.php" id="form" method="post" enctype="multipart/form-data" >
    <div>'.$message.'</div><br><br>
    <input type="file" name="file" /><br />
    <input type="submit" name="upload" value="  U P L O A D  " style="padding: 5px;" />
    <form>';
    echo $content;
    }
    elseif(isset($_GET['fbTrue']))
    {
        $token_url = "https://graph.facebook.com/oauth/access_token?"
            . "client_id=".$config['App_ID']."&redirect_uri=" . urlencode($config['callback_url'])
            . "&client_secret=".$config['App_Secret']."&code=" . $_GET['code'];

        $response = file_get_contents_curl($token_url);

        $params = null;
        parse_str($response, $params);
        $_SESSION['token'] = $params['access_token'];

        $content = '
    <style>
    #form
    {
        margin-left:auto;
        margin-right:auto;
        width: 220px;
    }
    </style>
    <form action="index.php" id="form" method="post" enctype="multipart/form-data" >
    <input type="file" name="file" /><br />
    <input type="submit" name="upload" value="  U P L O A D  " style="padding: 5px;" />
    <form>';

    }
    else
    {
        $content = '<a href="https://www.facebook.com/dialog/oauth?client_id='.$config['App_ID'].'&redirect_uri='.$config['callback_url'].'&scope=email,user_likes,publish_stream"><img src="./images/login-button.png" alt="Sign in with Facebook"/></a>';
    }

    echo $content;


    function file_get_contents_curl($url) { // function used to replace file_get_content and fopen
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
    // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
    $loginUrl = $helper->getLoginUrl('http://cliq.globalsuperelite.com/facebook_post/index.php', $permissions);
    echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}