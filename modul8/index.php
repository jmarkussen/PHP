<?php
session_start();

require_once __DIR__ . "/DBAuthDemo.php";
require_once __DIR__ . "/App/Models/UserModelAuthDemo.php";
require_once __DIR__ . "/App/Controller/AuthControllerAuthDemo.php";

$db = new DBAuthDemo();
$userModel = new UserModelAuthDemo($db->pdo);
$auth = new AuthControllerAuthDemo($userModel);

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'register':
        require_once __DIR__ . "/Views/register_view.php";
        break;
    case 'login':
        require_once __DIR__ . "/Views/login_view.php";
        break;
    case 'chat':
        require_once __DIR__ . "/Views/chat_view.php";
        break;
    case 'admin':
        require_once __DIR__ . "/Views/admin_view.php";
        break;
    case 'logout':
        require_once __DIR__ . "/Views/logout.php";
        break;
    default:
        header("Location: index.php?page=login");
        exit;
}
