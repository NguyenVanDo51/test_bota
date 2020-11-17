<nav class="mt-3">
    <div class="d-flex mx-5" style="justify-content: space-between;">
        <a href="/dashboard?controller=Dashboard&action=index">HOME</a>
        <div>
            <button class="btn btn-primary" id="btn1">Đăng nhập</button>
            <button class="btn btn-primary" id="btn2">Đăng ký</button>
        </div>
    </div>

</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../acssets/js/env.js"></script>
<script>
    console.log(sessionStorage.getItem('user_id'));
    if (sessionStorage.getItem('user_id') !== null) {
        let btn1 = $('#btn1');
        btn1.val('Đăng xuất');
        btn1.click(function () {
            $.post(URL + '?controller=User&action=logout', function (data, status) {
                sessionStorage.clear();
                console.log(data);
            })
        });
        $('#btn2').hide();
        console.log(btn1.val());
    } else {
        console.log(URL + 'views/Login.php');
        // $('#btn1').click(function() {
        //     // window.location.replace(URL + 'views/Login.php');
        //     console.log(URL + 'views/Login.php');
        // });
        // $('#btn2').click(function() {
        //     window.location.replace(URL + 'views/Register.php');
        // });
    }
</script>
<?php var_dump($_SESSION) ?>
