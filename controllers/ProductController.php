<?php

require_once('models/ProductModel.php');

class ProductController
{
    public function index()
    {
        $orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : '';
        $index = isset($_GET['index']) ? $_GET['index'] : 'DESC';
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $productModel = new ProductModel();
        $totalPage = $productModel->getTotal(20);
        $products = $productModel->paginate(20, $currentPage, $totalPage, $orderBy, $index);
        if ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'CTV') {
            require_once('views/Product/MemberView.php');
        } else {
            require_once("views/Product/Products.php");
        }
    }

    public function create()
    {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $img = isset($_POST['img']) ? $_POST['img'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';

        if ($title === '' && $description === '' && $img === '' && $price === '') {
            require_once('views/Product/AddProduct.php');
            exit();
        }

        if ($title === '' || $description === '' || $img === '' || $price === '') {
            echo "Vui long dien day du thong tin!";
        } else {

            $productModel = new ProductModel();
            $products = $productModel->create($title, $description, $img, $price, $_SESSION['user_id']);
            header("Location: http://login.test/products?controller=Product&action=index");
        }
    }

    public function remove()
    {
        require_once('Permission/AdminAndCTV.php');
        $product_id = $_GET['product_id'];
        $productModel = new ProductModel();
        $result = $productModel->remove($product_id);

        header("Location: http://login.test/products?controller=Product&action=index");
    }

    public function update()
    {
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $img = isset($_POST['img']) ? $_POST['img'] : '';
        $oldImg = isset($_POST['oldImg']) ? $_POST['oldImg'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $productModel = new ProductModel();

        if ($title === '' && $description === '' && $img === '' && $price === '') {
            $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
            $product = $productModel->find($product_id);
            require_once('views/Product/UpdateProduct.php');
            exit();
        }

        if ($title === '' || $description === '' || $price === '') {
            echo "Vui long dien day du thong tin!";
        } else {
            if ($img === '') {
                $img = $oldImg;
            }

            $products = $productModel->update($product_id, $title, $description, $img, $price);
            if ($products) {
                header("Location: http://login.test/products?controller=Product&action=index&page=" . $currentPage);
            } else {
                echo "Đã xảy ra lỗi hoặc không có thông tin được thay dổi, vui lòng kiểm tra lại!";
            }
        }
    }

    public function search()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        if ($search != '') {
            $productModel = new ProductModel();
            $products = $productModel->search($search);

            if ($_SESSION['role'] === 'Member') {
                require_once('views/Product/MemberView.php');
            } else {
                require_once("views/Product/Products.php");
            }
        } else {
            echo "Vui lòng nhập từ khóa để tìm kiếm!";
        }
    }
}
