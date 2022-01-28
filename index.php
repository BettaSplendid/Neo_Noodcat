<?php
use Router\Router;
require_once('vendor/autoload.php');
$router = new Router($_GET['url']);
$router->get("/", "App\Controller\AppController@index");
$router->get("/signin", "App\Controller\UserController@showSignIn");

$router->run();
?>

