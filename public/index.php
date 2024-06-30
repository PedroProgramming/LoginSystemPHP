<?php 

// start session
session_start();

// Define a control constant
define("CONTROL", true);

// Check id there is a logged in user
$user_logged = $_SESSION["user"] ?? null;

// Check what the route is in the url
if(empty($user_logged)){
    $route = 'login';
} else {
    $route = $_GET["route"] ?? 'home';
}

// If the user is logged in, but the route is login, it will direct to home
if(!empty($user_logged) && $route == "login"){
    $route = "home";
}

// Analyse the route
$routers = [
    'login' => 'login.php',
    'home' => 'home.php',
    'page1' => './pages/page1.php',
    'page2' => './pages/page2.php',
    'page3' => './pages/page3.php',
    'logout' => 'logout.php'
];

if(!key_exists($route, $routers)){
    die('Access denied!');
} 
require_once $routers[$route]
?>