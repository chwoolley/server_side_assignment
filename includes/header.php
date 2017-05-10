<?php

session_start();

include("./classes/db_manager.php");
include("./classes/password_manager.php");
include("./classes/session_manager.php");

$cms_DB = new DB_connect();
$groups_Menu = $cms_DB->get_all_Project_Groups();
$projects_Display = $cms_DB->display_all_Projects();
$projects_by_status = $cms_DB->display_all_byStatus();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<!-- <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script> -->
  <!-- <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script> -->
	
 

    
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">    
</head>
<body>
<header>
<a href="index.php"> <img  class="logo" src="./assets/logo-large.png"/></a>
<?php include "./includes/navigation.php" ?>
</header>    


