<?php
require_once('models/UserModel.php');

class UserController
{
    public function index()
    {
        $userModel = new UserModel();
        $userList = $userModel->all();

        require_once('views/UserList.php');
    }

    public function login()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        if ($password != '' && $email != '') {
            $usermodel = new UserModel();
            $user = $usermodel->login($email, $password);
            if ($user) {
                $_SESSION['email'] = $user->email;
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['role'] = $user->role;
                echo "Login";
                $url = "http://login.test/dashboard?controller=Dashboard&action=index";
                header("Location: " . $url);
            } else {
                echo "<div class='mt-3' style='text-align: center;'>Sai tên đăng nhập hoặc mật khẩu</div>";
                require_once('views/Login.php');

            }
        } else {
            require_once('views/Login.php');
        }
    }

    public function register()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $password_confirmation = isset($_POST['password']) ? $_POST['password_confirmation'] : '';
        if ($email != '' || $password != '') {
            $userModel = new UserModel();
            $result = $userModel->register($email, $password);
            if ($result) {
                echo "<p>Tạo tài khoản thành công!</p>";
                echo "<a href='/register?controller=User&action=login' class='btn btn-primary'>Đến trang đăng nhập</a>";
            } else {
                require_once('views/Register.php');
                echo "Tài khoản đã tồn tại hoặc thông tin nhập không hợp lệ!";
            }
        } else {
            require_once('views/Register.php');
        }
    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
        header("Location: http://login.test/");
    }

}
