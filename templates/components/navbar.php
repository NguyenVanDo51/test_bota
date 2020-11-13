<nav class="mt-3">
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<div class="d-flex mx-5" style="justify-content: space-between;">' .
            '<a href="/dashboard?controller=Dashboard&action=index">HOME</a>' .
            '<div><span>' . $_SESSION['email'] . ' <b>(' . $_SESSION['role'] . ')</b> </span>';
        if (!strpos($_SESSION['email'], '@'))
            echo '<button class="btn btn-primary" onclick="facebookLogout()">Đăng xuất</button>';
        else
            if (isset($_SESSION['function']) && $_SESSION['function'] === 'google') {
                echo '<a class="btn btn-primary" href="/templates/Auth/Logout.php">Logout</a>';
            } else
                echo '<a class="btn btn-primary" href="/logout?controller=User&action=logout"> Đăng xuất</a></div>
                    </div>
                    ';
    } else {
        echo '
            <nav class="d-flex mx-5" style="justify-content: right;">
                <a href="/register?controller=User&action=register" class="btn btn-primary mx-3">Đăng ký</a>
                <a href="/register?controller=User&action=login" class="btn btn-primary">Đăng nhập</a>  
            </nav>
        ';
    }
    ?>
    <script>
        function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
            console.log('statusChangeCallback');
            console.log(response);                   // The current login status of the person.
            if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                testAPI();
            } else {                                 // Not logged into your webpage or we are unable to tell.
                document.getElementById('status').innerHTML = 'Please log ' + 'into this webpage.';
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
        }

        function facebookLogout() {
            FB.getLoginStatus(function (response) {
                if (response.status === 'connected') {
                    FB.logout(function (response) {
                        // this part just clears the $_SESSION var
                        // replace with your own code
                        console.log('logout');
                        window.location.replace("https://75e28309a129.ngrok.io/products?controller=User&action=logout");
                        // let xhttp = new XMLHttpRequest();
                        //
                        // xhttp.onreadystatechange = function() {
                        //     if (this.readyState == 4 && this.status == 200) {
                        //         console.log(this.responseText);
                        //     }
                        // }
                        //
                        // xhttp.open("GET", "saveuser?controller=User&action=logout");
                        // xhttp.send();

                    });
                } else {
                    console.log("you are logout");
                }
            });
        }
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</nav>
