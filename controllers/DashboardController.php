<?php

class DashboardController
{
    public function index() {
        if ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'CTV') {
            header("Location: " . ROOT . "products?controller=Product&action=index");
        }
        require_once ('views/Dashboard.php');
    }
}
