<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../acssets/js/env.js"></script>
    <script>
        console.log(sessionStorage.getItem('user_id'));
        if (sessionStorage.getItem('user_id')) {
            // window.location.replace(URL + 'views/Product/MemberView.php');
        }
    </script>
</head>
<body>
<div class="card w-50 mx-auto mt-5" style="max-width: 500px;">
    <div class="card-header">
        Login form
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" id="password" class="form-control" name="password">
            </div>
            <div class="my-3">
                <a href="../views/Register.php">Chưa có tài khoản?</a>
            </div>
            <div class="text-center">
            </div>
        </form>
        <button onclick="submit()" class="btn btn-primary">Đăng nhập</button>
    </div>
    <script>


        function submit() {
            $.post(URL + '?controller=User&action=login', {
                email: $('#email').val(),
                password: $('#password').val()
            }, function(data, code){
                console.log(data);
                if (data.status === 200) {
                    sessionStorage.setItem('user_id', data.user.user_id);
                    sessionStorage.setItem('role', data.user.role);
                    sessionStorage.setItem('email', data.user.email);
                    window.location.replace(URL + 'views/Product/MemberView.php');
                }else if (data.status === 403) {
                    alert("Têm tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!");
                } else {
                    alert("Có gì đó sai sai. Vui lòng kiếm tra lại!");
                }
            });
        }
    </script>
</body>
</html>

