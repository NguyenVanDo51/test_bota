<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require_once ('templates/components/navbar.php')?>
<div class="mt-5">
    <div class="container">
        <h3>Danh sách tài khoản người dùng:</h3>
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Email</th>
            <th>Nhóm</th>
            <th>Hành động</th>
            </thead>
            <tbody>
            <?php
            if (isset($userList)) {
                foreach ($userList as $user) {
                    echo '<tr>' .
                        '<td>' . $user["user_id"] . '</td>' .
                        '<td>' . $user["email"] . '</td>' .
                        '<td>' . $user["role"] . '</td>' .
                        '<td> <a href="/permission?controller=Permission&action=index&user_id=' . $user["user_id"] . '" class="btn btn-primary">Phân quyền</a></td>' .
                        '</tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
