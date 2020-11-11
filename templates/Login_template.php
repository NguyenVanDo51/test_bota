<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="card w-50 mx-auto mt-5">
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
            <button type="submit" class="btn btn-primary">Đăng nhập</button>

        </form>
    </div>
</div>

</body>
</html>
