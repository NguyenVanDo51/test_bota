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
        Phân quyền cho tài khoản <b> <?= isset($user->email) ? $user->email : '' ?></b>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="radio">
                <label><input class="mr-2" type="radio" name="role" value="Admin" <?= ($user->role === "Admin") ? "checked" : '' ?>>Admin</label>
            </div>
            <div class="radio">
                <label><input class="mr-2" type="radio" name="role" value="CTV" <?= ($user->role === "CTV") ? "checked" : '' ?>>CTV</label>
            </div>
            <div class="radio disabled">
                <label><input class="mr-2" type="radio" name="role" value="Member" <?= ($user->role === "Member") ? "checked" : '' ?>>Member</label>
            </div>
            <button class="btn btn-primary mr-2" type="submit">Lưu thay đổi</button>
            <button class="btn" type="button" onclick="goBack()">Hủy</button>
        </form>

    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>
