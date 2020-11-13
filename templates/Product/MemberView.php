<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .img-custom {
            height: 200px;
            width: 200px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<?php require_once ('templates/components/navbar.php')?>
<div class="mt-5">
    <div class="container">
        <h3>Danh sách sản phẩm:</h3>
        <?php require_once ('templates/components/SearchProduct.php')?>
        <div class="row">
            <?php
            if (isset($products)) {
                foreach ($products as $product) {
                    echo '<div class="col-3">
                            <div class="card my-3" style="height: 300px; text-align: center;">
                               <div class="card-body">
                                    <img src="../../acssets/images/' . $product["img"] . '" alt="Img" class="img-custom">
                                    <p class="my-2"> ' . $product["title"] . '</p>
                                    <p class="text-primary"> ' . $product["price"] . 'đ</p>
                                </div>
                            </div>
                           </div>';
                }
            }
            ?>
        </div>

        <?php require_once('templates/components/Paginator.php') ?>
    </div>
</div>
</body>
</html>
