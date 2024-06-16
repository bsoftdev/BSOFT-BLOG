<?php 

require_once("vendor/autoload.php");


use \Slim\Slim;


$app = new Slim();
$app->config('debug', true);

   //INCLUDING THE ROUTES	
   require_once("client_side.php");
   require_once("admin_side.php");


$app->run();

 ?>

