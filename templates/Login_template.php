<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="card w-50 mx-auto mt-5" style="max-width: 500px;">
    <div class="card-header">
        Login form
    </div>
    <div class="card-body">
        <div class="my-3">
            <?= isset($msg) ? $msg : '' ?>
        </div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="my-3">
                <a href="/register?controller=User&action=register">Chưa có tài khoản?</a>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>
        </form>

        <!-- The JS SDK Login Button -->
        <p class="text-center my-2">Hoặc đăng nhập với</p>
        <div class="d-flex">
            <fb:login-button class="mr-2" scope="public_profile,email" data-size="large" data-button-type="login_with"
                             onlogin="checkLoginState();">
                Facebook
            </fb:login-button>
        <?php
        //Include Google Client Library for PHP autoload file
        require_once 'vendor/autoload.php';

        //Make object of Google API Client for call Google API
        $google_client = new Google\Client();

        //Set the OAuth 2.0 Client ID
        $google_client->setClientId('260963266047-dteas8ug60f2stqk35hh5ep02hsl3lsk.apps.googleusercontent.com');

        //Set the OAuth 2.0 Client Secret key
        $google_client->setClientSecret('d-8M5McjOLjUxbDm_xYiQ9Kh');

        //Set the OAuth 2.0 Redirect URI
        $google_client->setRedirectUri('https://75e28309a129.ngrok.io/templates/Auth/Oauth2Callback.php');

        $google_client->addScope('email');

        $google_client->addScope('profile');

        echo '<div><a class="btn btn-primary" href="' . $google_client->createAuthUrl() . '">Google</a></div>';
        ?>

    </div>
</div>
<script>

    function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
        console.log('statusChangeCallback');
        console.log(response);                   // The current login status of the person.
        if (response.status === 'connected') {   // Logged into your webpage and Facebook.
            testAPI();
        } else {                                 // Not logged into your webpage or we are unable to tell.
            console.log("Login error");
        }
    }

    function checkLoginState() {               // Called when a person is finished with the Login Button.
        FB.getLoginStatus(function (response) {   // See the onlogin handler
            statusChangeCallback(response);
        });
    }


    window.fbAsyncInit = function () {
        FB.init({
            appId: '643362112998605',
            cookie: true,                     // Enable cookies to allow the server to access the session.
            xfbml: true,                     // Parse social plugins on this webpage.
            version: 'v9.0'           // Use this Graph API version for this call.
        });


        FB.getLoginStatus(function (response) {   // Called after the JS SDK has been initialized.
            statusChangeCallback(response);        // Returns the login status.
        });
    };

    function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
        FB.api('/me', function (response) {

            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    window.location.replace("https://75e28309a129.ngrok.io/products?controller=Dashboard&action=index");
                }
            }

            xhttp.open("GET", "saveuser?controller=User&action=loginWithFacebook&user=" + response.id);
            xhttp.send();


            console.log('Successful login for: ' + response.id);
            document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
        });
    }

</script>

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
</html>
