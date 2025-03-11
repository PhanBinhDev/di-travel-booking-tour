<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$route = isset($_GET['route']) ? $_GET['route'] : '';
require_once "./Controllers/homeController.php";
require_once "./Controllers/newsController.php";
require_once "./Controllers/admin.php";
require_once "./Controllers/login.php";
require_once "./Controllers/client.php";

$home = new homeControllers();
$news = new newsControllers();
$admin = new adminControllers();
$client = new clientControllers();

switch($route){
    case 'home':
        $home->home();
        break;
    case 'news':
        $news->news();
        break;
    case 'gt':
        $news->gt();
        break;
    case 'lh':
        $news->lh();
        break;
    case 'newsdetail':
        $news->newsDetail();
        break;
    case 'tourdetail':
        $home->tourDetail();
        break;
    case 'admin':
        $admin->admin();
        break;
    case 'newTour':
        $admin->newTour();
        break;
    case 'addNews':
        $admin->addNews();
        break;
    case 'editTour':
        $admin->editTour();
        break;
    case 'editNews':
        $admin->editNews();
        break;
    case 'admin/tourDelete':
    case 'admin/newsDelete':
    case 'admin/bookingsDelete':
    case 'admin/reviewsDelete':
    case 'admin/contactDelete':
        $admin->deleteItem();
        break;
    case 'client':
        $home->client();
        break;
    case 'client/bookingsDelete':
        $client->deleteItem();
    case 'payment':
        $client->bookedTour();
        break;
    case 'paymentmethod':
        $client->payment();
        break;
    case 'search':
        $home->search();
        break;
    case 'alltour':
        $home->alltour();
        break;
    case 'login':
        $login = new loginControllers();
        $login->login();
        break;
    case 'logout':
        $logout = new loginControllers();
        $logout->logout();
        break;

    default:
        $home->home();
    break;
}