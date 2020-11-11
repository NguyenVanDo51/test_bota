<?php

if($_SESSION['role'] !== 'CTV') {
    echo "<h3 class='text-danger'>Bạn không có quyền thực hiên hành động này !</h3>";
    echo "<script>
            function goBack() {
              window.history.back()
            }
            </script>";
    echo "<button class='btn btn-primary' onclick='goBack()' }'>Quay lại trang trước</button>";
    exit();
}
