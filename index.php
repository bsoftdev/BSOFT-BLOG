<?php 

session_start();
require_once("vendor/autoload.php");


use \Slim\Slim;


$app = new Slim();
$app->config('debug', true);

   //INCLUDING THE ROUTES
   require_once("functions.php");	
   require_once("client_side.php");
   require_once("admin_side.php");
   require_once("admin-categories.php");
   require_once("admin-users.php");
   require_once("admin-posts.php");



$app->run();

 ?>

