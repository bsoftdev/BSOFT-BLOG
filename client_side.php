<?php 

use \Hcode\Page;


$app->get('/', function() {
  
	  $page = new Page();
	  $page->setTpl("index");

});




$app->get("/signup", function(){

	$page = new Page();
	$page->setTpl("signup");
});