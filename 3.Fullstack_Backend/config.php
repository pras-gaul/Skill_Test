<?php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
//Set the OAuth 2.0 Client ID
$google_client->setClientId('965938161253-04cg9jkbchgvskbmk8qt1bc445vdu88c.apps.googleusercontent.com');
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/skill_test/Skill_Test/3.Fullstack_Backend/index.php');

$google_client->addScope('email');
$google_client->addScope('profile');

session_start();

?>