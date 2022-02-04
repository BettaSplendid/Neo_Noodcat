<?php

use Router\Router;

require_once('vendor/autoload.php');

$router = new Router($_GET['url']);
if (isset($_SESSION)) {
    switch ($_SESSION['type']) {
        case "client":

            break;
        case "cashier":;

            break;

        case "manager":;

            break;

        default:
    }
} else {
    $_SESSION['email'] = 'default';
    $_SESSION['type'] = 'default';
    $_SESSION['firstname'] = 'default';
}

$router->get("/", "App\Controller\AppController@index");

$router->get("/register", "App\Controller\UserController@showregister");
$router->post("/register", "App\Controller\UserController@register");
$router->get("/login", "App\Controller\UserController@showLogin");
$router->post("/login", "App\Controller\UserController@login");

//Cats
$router->get("/cats", "App\Controller\CatController@index");
$router->get("/cats_list", "App\Controller\CatController@displayAllcats");
$router->get("/cats_add", "App\Controller\CatController@showAddCat");
$router->post("/cats_add", "App\Controller\CatController@addCat");
$router->get("/cat_add_random", "App\Controller\CatController@AddRandomCat");


//Bar
$router->get("/bar", "App\Controller\BarController@index");
$router->get("/showbars", "App\Controller\BarController@displayAllBars");
$router->get("/add_Bar", "App\Controller\BarController@showAddBar");
$router->post("/add_Bar", "App\Controller\BarController@addBar"); 
$router->get("/add_random_bar", "App\Controller\BarController@AddRandomBar");
//Final
$router->run();
