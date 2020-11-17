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
        $totalPage = $productModel->getTotal(10);
        $products = $productModel->paginate(10, $currentPage, $totalPage, $orderBy, $index);
	echo json_encode([
		'total' => $totalPage,
		'currentPage' => $currentPage,
		'orderBy' => $orderBy,
		'index' => $index,
		'products' => $products
	]);
//        if ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'CTV') {
//            require_once('views/Product/MemberView.php');
//        } else {
//            require_once("views/Product/Products.php");
//        }
    }

    public function create()
    {
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $description = isset($_GET['description']) ? $_GET['description'] : '';
        $img = isset($_GET['img']) ? $_GET['img'] : '';
        $price = isset($_GET['price']) ? $_GET['price'] : '';

        if ($title === '' && $description === '' && $img === '' && $price === '') {
            require_once('views/Product/AddProduct.php');
            exit();
        }

        if ($title === '' || $description === '' || $img === '' || $price === '') {
		echo json_encode([
		     'status' => 404,
		     'message' => 'Invalid information'
		]);
        } else {

            $productModel = new ProductModel();
            $products = $productModel->create($title, $description, $img, $price, 1);
	    echo json_encode([
	        'status' => 200,
		'message' => 'Create new product successfully'
	    ]);
        }
    }

    public function remove()
    {
        //require_once('Permission/AdminAndCTV.php');
        $product_id = $_GET['product_id'];
        $productModel = new ProductModel();
        $result = $productModel->remove($product_id);

	if ($result) {
	    echo json_encode([
	        'status' => 200,
		'message' => 'remove successfully!'
	    ]);
	}else 
	    echo json_encode([
	        'status' => 403,
		'message' => 'Error'
	    ]);
    }

    public function update()
    {
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $description = isset($_GET['description']) ? $_GET['description'] : '';
        $img = isset($_GET['img']) ? $_GET['img'] : '';
        $oldImg = isset($_GET['oldImg']) ? $_GET['oldImg'] : '';
        $price = isset($_GET['price']) ? $_GET['price'] : '';

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $productModel = new ProductModel();

        if ($title === '' && $description === '' && $img === '' && $price === '') {
            $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
            $product = $productModel->find($product_id);
            //require_once('views/Product/UpdateProduct.php');
            //exit();
            echo "Null";
        }

        if ($title === '' || $description === '' || $price === '') {
            echo json_encode([
            	'status' => 404,
            	'message' => "Vui long dien day du thong tin!",
            	'details' => [
            	    'title' => $title,
            	    'des' => $description,
            	    'price' => $price
            	]
            ]);
        } else {
            if ($img === '') {
                $img = $oldImg;
            }

            $products = $productModel->update($product_id, $title, $description, $img, $price);
            if ($products) {
                //header("Location: " . ROOT . "products?controller=Product&action=index&page=" . $currentPage);
                echo json_encode([
                	"status" => 200,
                	"message" => "Update successfully!"
                ]);
            } else {
                echo "Nothing update!";
            }
        }
    }

    public function search()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
    
        $productModel = new ProductModel();
        $products = $productModel->search($search);

	echo json_encode([
	    'keyword' => $search,
	    'products' => $products
	    ]);
    }
}
