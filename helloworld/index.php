<?php
/* include the PHP Facebook Client Library to help
  with the API calls and make life easy */
require_once('../php/facebook.php');

/* initialize the facebook API with your application API Key
  and Secret */
$api_key = 'dda28e2d89576ebc455489e4a5026c06';
$api_secret = '7884256ec788d640df00a12acd51173f';
$facebook = new Facebook($api_key, $api_secret);

/* require the user to be logged into Facebook before
  using the application. If they are not logged in they
  will first be directed to a Facebook login page and then
  back to the application's page. require_login() returns
  the user's unique ID which we will store in fb_user */
$user = $facebook->require_login();

?>

<h2>Hi <fb:name firstnameonly="true" uid="<?=$user?>" useyou="false"/>!</h2><br/>! Welcome to my first application!

<?php

// Print out at most 25 of the logged-in user's friends,
// using the friends.get API method
echo "<p>Friends:";
$friends = $facebook->api_client->friends_get();
$friends = array_slice($friends, 0, 25);
foreach ($friends as $friend) {
  echo "<br>$friend";
}
echo "</p>";

/* We'll also echo some information that will
  help us see what's going on with the Facebook API: */
echo "<pre>Debug:" . print_r($facebook,true) . "</pre>";

?>
