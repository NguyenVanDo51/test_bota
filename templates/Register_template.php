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
        Register form
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="my-3">
                <a href="/login?controller=User&action=login">Đã có tài khoản?</a>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
</div>

</body>
</html>
