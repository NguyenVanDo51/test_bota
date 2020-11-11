<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require_once ('templates/components/navbar.php')?>
<div class="card w-50 mx-auto mt-5">
    <div class="card-header">
        Dashboard
    </div>
    <div class="card-body">
        <a href="/users?controller=User&action=index">Danh sách tài khoản</a><br>
        <a href="/products?controller=Product&action=index">Danh sách sản phẩm</a>
    </div>
</div>

</body>
</html>
