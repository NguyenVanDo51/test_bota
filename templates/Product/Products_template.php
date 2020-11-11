<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require_once ('templates/components/navbar.php')?>
<div class="mt-5">
    <div class="container">
        <h3>Danh sách sản phẩm:</h3>
        <?php require_once ('templates/components/SearchProduct.php')?>
        <div class="d-flex">
            <a href="/product/create?controller=Product&action=create" class="btn btn-primary my-2">Thêm sản phẩm mới</a>
        </div>
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Giá bán(vnđ)</th>
            <th>Người đăng</th>
            <th>Hành động</th>
            </thead>
            <tbody>
            <?php
            if (isset($products)) {
                foreach ($products as $product) {
                    echo '<tr>' .
                        '<td>' . $product["id"] . '</td>' .
                        '<td>' . $product["title"] . '</td>' .
                        '<td>' . $product["description"] . '</td>' .
                        '<td> <img src="../../acssets/images/' . $product["img"] . '" alt="Img" class="img-fluid" style="height:75px;"></td>' .
                        '<td>' . $product["price"] . '</td>' .
                        '<td>' . $product["email"] . '</td>' .
                        '<td> 
                            <a href="/permission?controller=Product&action=update&product_id=' . $product["id"] . '">Sửa</a>
                            <a href="/permission?controller=Product&action=remove&product_id=' . $product["id"] . '">Xóa</a></td>' .
                        '<td> </td>' .
                        '</tr>';
                }
            }
            ?>
            </tbody>
        </table>
        <?php require_once ('templates/components/Paginator.php')?>
    </div>
</div>


</body>
</html>
