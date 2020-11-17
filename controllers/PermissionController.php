<?php

ob_start();

require_once('models/UserModel.php');

class PermissionController
{
    public function index()
    {
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
        $role = isset($_GET['role']) ? $_GET['role'] : '';
        if ($user_id != '') {
            $userModel = new UserModel();
            $user = $userModel->find($user_id);
            if ($role != '') {
                $user = $userModel->changeRole($user_id, $role);
                if ($user === 0) {
		    echo json_encode([
			"status" => 403,
			"message" => "Change fail",	
			]);
                } else {
                    echo json_encode([
		         "status" => 200,
			 "message" => "Change successfully!",
			 "user" => $user
		    ]);     
               }
            }
        }
    }
}
