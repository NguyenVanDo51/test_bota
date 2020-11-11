<?php
if (!isset($_SESSION['user_id'])) {
    require_once ('templates/Login_template.php');
    exit();
} else {
    require_once ('templates/Dashboard_template.php');
    exit();
}
