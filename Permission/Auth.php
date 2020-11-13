<?php
if (!isset($_SESSION['user_id'])) {
    require_once('templates/Login_template.php');
    exit();
} else {
    if ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'CTV')
        require_once('templates/Dashboard_template.php');
    else
        require_once ('templates/Product/MemberView.php');
    exit();
}
