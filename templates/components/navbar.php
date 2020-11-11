<nav class="mt-3">
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<div class="d-flex mx-5" style="justify-content: space-between;">' .
            '<a href="/dashboard?controller=Dashboard&action=index">HOME</a>' .
            '<div><span>' . $_SESSION['email'] . ' <b>(' . $_SESSION['role'] . ')</b> </span>' .
            '<a href="/logout?controller=User&action=logout"> Đăng xuất</a></div>
                    </div>
                    ';
    } else {
        echo '
            <nav class="d-flex mx-5" style="justify-content: right;">
                <a href="/register?controller=User&action=register" class="btn btn-primary mx-3">Đăng ký</a>
                <a href="/register?controller=User&action=login" class="btn btn-primary">Đăng nhập</a>  
            </nav>
        ';
    }
    ?>

</nav>
