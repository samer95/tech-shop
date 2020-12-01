<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tech Shop</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <!--[if ie]>
    <meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->

    <!-- bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <link href="themes/css/bootstrappage.css" rel="stylesheet"/>

    <!-- global styles -->
    <link href="themes/css/flexslider.css" rel="stylesheet"/>
    <link href="themes/css/main.css" rel="stylesheet"/>

    <!-- scripts -->
    <script src="themes/js/jquery-1.7.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="themes/js/superfish.js"></script>
    <script src="themes/js/jquery.scrolltotop.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php
require 'config.php';

session_start();
$isLoggedIn = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;

$baseUrl = $config['baseUrl'];

// prepare database fetcher
$dsn = "mysql:host={$config['DBHost']};dbname={$config['DBName']}";
$user = $config['DBUser'];
$password = $config['DBPassword'];
$pdo = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

require 'src/Layout/TopBar.php';
?>

<div id="wrapper" class="container">

<? require 'src/Layout/NavBar.php'; ?>