<?php
ob_start();
$pages = [
    'home'   => "Accueil",
    'list'   => "My list table",
    'login'  => "Connection",
    'cart'   => "my cart list",
    'logout' => "",
];

$page = 'home';

// make it that when ?page=name-of-the-page function isset(_GET) displays page titles

// ===========>> QUESTION WHERE IS $_GET FUNCTION SET IN THIS CASE ???
if (isset($_GET['page']) && array_key_exists($_GET['page'], $pages)) {
    $page = $_GET['page'];
}

$pageTitle = $pages[$page];

include_once "includes/header.php";
include_once 'pages/'. $page .'.php';
include_once "includes/footer.php";
ob_end_flush();
?>