<!DOCTYPE html>
<html>
<head>
    <title> Login </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="mt-3">
    <span class="m-3">
        Hello, <?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>
    </span>
    <a href="/logout?controller=User&action=logout">Đăng xuất</a>
</nav>
<div class="mt-5">
    <div class="container">
        <h3>Thêm sản phẩm mới:</h3>
        <div>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Mô tả"> </textarea>
                </div>
                <div class="form-group">
                    <label for="img">Hình ảnh</label>
                    <input type="file" class="form-control-file" id="img" name="img">
                </div>
                <div class="form-group">
                    <label for="price">Giá bán(vnđ)</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Giá bán">
                </div>
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                <button type="button" class="btn" onclick="goBack()">Hủy</button>
            </form>
        </div>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
