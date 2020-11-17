<?php
require_once('models/UserModel.php');

class UserController
{
    public function index()
    {
        $userModel = new UserModel();
        $userList = $userModel->all();

	echo json_encode([
	    'status' => 200,
	    'message' => 'Get users successfully',
	    'users' => $userList
	]);
    }

    public function getUser() {
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if ($user_id !== '') {
            echo json_encode([
                'status' => 200,
                'message' => 'You are login',
                'user_id' => $_SESSION['user_id'],
                'email' => $_SESSION['email'],
                'role' => $_SESSION['role']
            ]);
        }
        echo json_encode([
            'status' => 403,
            'message' => 'You are not login!'
        ]);
    }

    public function login()
    {
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        $password = isset($_GET['password']) ? $_GET['password'] : '';
        if ($password != '' && $email != '') {
            $usermodel = new UserModel();
            $user = $usermodel->login($email, $password);
            if ($user) {
                $_SESSION['email'] = $user->email;
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['role'] = $user->role;
                echo json_encode([
                   'message' => 'successfully',
                   'status' => 200,
                    'user' => $user,
                    'session' => [
                        'email' => $_SESSION['email'],
                        'user_id' => $_SESSION['user_id'],
                        'role' => $_SESSION['role'],
                    ]
                ]);
            } else {
                echo json_encode([
                    'message' => 'Sai email hoac mat khau',
		            'status' => 403
                ]);
            }
        } else {
            echo json_encode([
                'message' => 'null',
                'status' => 404
            ]);
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
        echo json_encode([
            'message' => 'Đăng xuất thành công!',
            'status' => 200
        ]);
    }

}
