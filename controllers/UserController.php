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
                $url = ROOT . "dashboard?controller=Dashboard&action=index";
                header("Location: " . $url);
            } else {
                echo "<div class='mt-3' style='text-align: center;'>Sai tên đăng nhập hoặc mật khẩu</div>";
                require_once('views/Login.php');

            }
        } else {
            require_once('views/Login.php');
        }
    }

    public function loginWithFacebook()
    {
        session_start();
        $userId = isset($_GET['user']) ? $_GET['user'] : '';

        if ($userId === '') {
            return "Error";
        }

        $userModel = new UserModel();

        $user = $userModel->register((string)$userId, (string)$userId);   // tra ve 0 neu da ton tai, neu chua ton tai thi them moi va tra ve user

        if ($user) {
            // Neu chua ton tai roi
            $_SESSION['email'] = $user->email;
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['role'] = $user->role;
            echo 1;
        } else {
            // Neu da ton tai
            $user = $userModel->login((string)$userId, (string)$userId);
            $_SESSION['email'] = $user->email;
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['role'] = $user->role;
            echo 0 . $_SESSION['email'] . $_SESSION['user_id'];
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
        header("Location: " . ROOT);
    }

}
