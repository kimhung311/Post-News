<?php
if (!isset($_SESSION['user'])) {
    header('Location: .?controller=admin&action=login');
    exit();
}