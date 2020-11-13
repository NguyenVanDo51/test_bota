<?php
require_once('../../vendor/autoload.php');
require_once ('../../config/config.php');
session_start();

//Make object of Google API Client for call Google API
$google_client = new Google\Client();
//Set the OAuth 2.0 Client ID
$google_client->setClientId('260963266047-dteas8ug60f2stqk35hh5ep02hsl3lsk.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('d-8M5McjOLjUxbDm_xYiQ9Kh');
$google_client->setRedirectUri('https://75e28309a129.ngrok.io/templates/Auth/Oauth2Callback.php');
$google_client->addScope('email');
$google_client->addScope('profile');


//logout.php

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();

header('location: ' . ROOT);