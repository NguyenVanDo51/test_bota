<?php
/**
 *
 */
require_once('DbModel.php');

class UserModel extends DbModel
{

    public function login($email, $password)
    {
        $con = $this->connect();
        try {
            $sql = "SELECT * FROM `users` WHERE email = '$email' and password = '$password'";
            $user = $con->query($sql);
            $user->setFetchMode(PDO::FETCH_ASSOC);
            return $user->fetchObject();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function register($email, $password, $function = null)
    {
        // kiem tra xem ten dang nhap ton tai hay chua
        $con = $this->connect();
        $check = "SELECT * FROM `users` WHERE email ='" . $email . "'";
        $result = $con->query($check);
        if ($result->rowCount() > 0) {  // Neu da ton tai roi thi tra ve 0
            return 0;
        } else {  // chua ton tai thi them moi
            try {
                $query = "INSERT INTO users (`email`, `password`, `function`) VALUES ('$email', '$password', '$function' )";
                $result = $con->exec($query);
                return $result;
            } catch (PDOException $e) {
                echo '<br>' . $query;
                echo "<br>Error while register: " . $e->getMessage();
            }
        }
    }

    public function all()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM `users` ";

        try {
            $result = $conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $conn = null;
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return mixed|string
     */
    public function find($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM `users` WHERE `users`.`user_id`=" . $id;

        try {
            $result = $conn->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetchObject();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function changeRole($id, $role)
    {
        $conn = $this->connect();
        $query = "UPDATE `users` SET role='" . $role . "' WHERE `users`.`user_id` = " . $id;

        try {
            $result = $conn->prepare($query);

            $result->execute();

            return $result->rowCount();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

//    public function findUserFB($userId)
//    {
//        $conn = $this->connect();
//        try {
//            $query = "SELECT * FROM `users` WHERE email = $userId";
//            $result = $conn->query($query);
//            if ($result->rowCount() > 0) {  // Neu da ton tai
//                try {
//                    $query = 'INSERT INTO users (`email`, `password`) VALUES ("' . $email . '", "' . $password . '")';
//                    $result = $conn->exec($query);
//                    echo $result;
//                } catch (PDOException $e) {
//                    echo "Error: " . $e->getMessage();
//                }
//                return 0;
//            } else {
//
//            }
//        } catch (PDOException $e) {
//            echo "Error: " . $e->getMessage();
//        }
//    }
}
