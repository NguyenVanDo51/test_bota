<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .img-res {
            height: 50px;
            width: auto;
            object-fit: contain;
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php
    require_once ('../../templates/components/navbar.php')
?>
<div class="container">
    <div class="row">
        <table id="table" class="table" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Người đăng</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody id="body">
            </tbody>
        </table>
    </div>
</div>
<script src="../../acssets/js/env.js"></script>
<script>
    $.get(URL + "products?controller=Product&action=index", function (data, status) {
        let table = $('#body');
        let str = '';
        data.map(function (row) {
            str += '<tr>' +
                '<td>' + row.id + '</td>' +
                '<td>' + row.title + '</td>' +
                '<td>' + row.description + '</td>' +
                '<td><img class="img-res" src="../../acssets/images/' + row.img + '" alt="Image"/></td>' +
                '<td>' + row.price + '</td>' +
                '<td>' + row.email + '</td>' +
                '<td> <button class="btn btn-small btn-primary mr-2">Sửa</button><button class="btn btn-small btn-primary">Xóa</button></td>' +
                '</tr>';
        });
        table.html(str);
    })
</script>

</body>
</html>