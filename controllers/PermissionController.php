<?php

ob_start();

require_once('models/UserModel.php');

class PermissionController
{
    public function index()
    {
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : '';
        if ($user_id != '') {
            $userModel = new UserModel();
            $user = $userModel->find($user_id);
            require_once('views/Permission.php');
            if ($role != '') {
                $user = $userModel->changeRole($user_id, $role);
                if ($user === 0) {
                    echo "Có gì đó sai sai, vui lòng thử lại!";
                } else {
                    header("Location:" . ROOT . "users?controller=User&action=index");
                }
            }
        }
    }
}
