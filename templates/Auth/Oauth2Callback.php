<?php
require_once('../../vendor/autoload.php');
require_once ('../../models/UserModel.php');
require_once ('../../config/config.php');

session_start();

//Make object of Google API Client for call Google API
$google_client = new Google\Client();
echo 'login';

//Set the OAuth 2.0 Client ID
$google_client->setClientId('260963266047-dteas8ug60f2stqk35hh5ep02hsl3lsk.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('d-8M5McjOLjUxbDm_xYiQ9Kh');
$google_client->setRedirectUri('https://75e28309a129.ngrok.io/templates/Auth/Oauth2Callback.php');
$google_client->addScope('email');
$google_client->addScope('profile');

if (isset($_GET["code"])) {
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        if (!empty($data['email'])) {
            $userModel = new UserModel();

//            $user = $userModel->login((string)$data['email'], (string)$data['email']);
            $user = $userModel->register((string)$data['email'], (string)$data['email'], 'google');

            $user = $userModel->login((string)$data['email'], (string)$data['email']);

            $_SESSION['email'] = $user->email;
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['role'] = $user->role;
            $_SESSION['function'] = $user->function;

            header('Location: ' . ROOT . 'dashboard?controller=Dashboard&action=index');

        }

    }
}
