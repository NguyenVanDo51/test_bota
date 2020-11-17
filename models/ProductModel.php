<?php

require_once('DbModel.php');

class ProductModel extends DbModel
{
    private $conn = null;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function all()
    {
        $query = "SELECT P.id, P.title, P.description, P.img, P.price, U.email as `email` FROM bota_product as P, users as U WHERE P.user_id=U.user_id";

        try {
            $result = $this->conn->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $this->conn = null;
            return $result->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function create($title, $description, $img, $price, $user_id)
    {
        $query = "INSERT INTO `bota_product` (`title`, `description`, `img`, `price`, `user_id`) 
            VALUES ('" . $title . "', '" . $description . "', '" . $img . "', " . $price . ", " . $user_id . ")";

        try {
            $result = $this->conn->exec($query);

            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function remove($product_id)
    {
        $query = 'DELETE FROM `bota_product` WHERE id=' . $product_id;
        try {
            $result = $this->conn->exec($query);
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($product_id, $title, $description, $img, $price)
    {
        $query = "UPDATE `bota_product` SET title='" . $title . "', description='" . $description . "', 
        img='" . $img . "', price='" . $price . "' WHERE id=" . $product_id;

        try {
            $result = $this->conn->exec($query);

            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function find($product_id)
    {
        $query = "SELECT * FROM `bota_product` WHERE `bota_product`.`id`=" . $product_id;

        try {
            $result = $this->conn->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $this->conn = null;
            return $result->fetchObject();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function paginate($limit, $currentPage, $totalPage, $orderBy, $index)
    {
        // Gioi han currentPage tu 1 den tong so trang
        if ($currentPage > $totalPage) {
            $currentPage = $totalPage;
        } else if ($currentPage < 1) {
            $currentPage = 1;
        }

        // Tim start
        $start = ($currentPage - 1) * $limit;
        $query = "SELECT P.id, P.title, P.description, P.img, P.price, U.email as `email` 
FROM bota_product as P, users as U WHERE P.user_id=U.user_id ORDER BY P.id DESC";

        if ($orderBy !== '') {
            $query .= " ORDER BY $orderBy $index";
        }

        $query .= " LIMIT $start, $limit";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function getTotal($limit)
    {
        try {
            // tim tong so records
            $totalRecord = $this->conn->query("SELECT count(id) FROM `bota_product`")->fetchColumn();
            return ceil($totalRecord / $limit);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function search($search)
    {
        $query = "SELECT P.id, P.title, P.description, P.img, P.price, U.email as `email` 
FROM bota_product as P, users as U WHERE P.user_id=U.user_id AND P.title like '%$search%' LIMIT 10";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
