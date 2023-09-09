<?php
require "bootstrap.php";
 
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // /controller/method/

$uri = explode( '/', $uri ); // ['','controller','method']

$count = count($uri); // 3

$controller = ucfirst($uri[$count-2])."Controller"; // ['','Controller','method'] Capitalize second element

require "controller/".$controller.".php"; // "controller/UsersController.php" if the path is "/users/view"
 
$objFeedController = new $controller();

// If the path is "/users/view", it will set $strMethodName to "viewAction"
$strMethodName = $uri[$count-1] . 'Action'; 

// if the path is "/users/view", it will call the "viewAction" method on the "UsersController" instance.
$objFeedController->{$strMethodName}();
?>
