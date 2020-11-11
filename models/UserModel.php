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
            $sql = 'SELECT * FROM `users` WHERE email = "' . $email . '" and password = "' . $password . '" ';
            $user = $con->query($sql);
            $user->setFetchMode(PDO::FETCH_ASSOC);
            return $user->fetchObject();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

    }

    public function register($email, $password)
    {
        // kiem tra xem ten dang nhap ton tai hay chua
        $con = $this->connect();
        $check = "SELECT * FROM `users` WHERE email ='" . $email . "'";
        $result = $con->query($check);
        if ($result->rowCount() > 0) {
            return 0;
        } else {
            try {
                $query = 'INSERT INTO users (`email`, `password`) VALUES ("' . $email . '", "' . $password . '")';
                $result = $con->exec($query);
                return $result;
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
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
            return "Error: " . $e->getMessage();
        }
    }

    public function find($id)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM `users` WHERE `users`.`user_id`=" . $id;

        try {
            $result = $conn->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetchObject();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
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
            echo "Query: " . $query;
            echo "Error: " . $e->getMessage();
        }

    }
}
