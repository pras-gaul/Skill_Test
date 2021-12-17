<?php
session_start();

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = '965938161253-04cg9jkbchgvskbmk8qt1bc445vdu88c.apps.googleusercontent.comconfig'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost/skill_test/Skill_Test/3.Fullstack_Backend/welcome.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>
