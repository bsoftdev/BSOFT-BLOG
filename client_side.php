<?php 

use \Hcode\Page;
use \Hcode\Model\User;


$app->get('/', function() {
  
	  $page = new Page();
	  $page->setTpl("index");

});

#LOGIN ROUTE PAGE
$app->get('/login', function() {

  
	  $page = new Page();
	  $page->setTpl("login",[

	  		 "loginError" =>User::getError()
	  ]);

});



$app->post("/login", function(){

	try {

	    User::login($_POST["phone"], $_POST['password']);
		
	} catch (Exception $e) {
		User::setError($e->getMessage());
	}
	header("Location: /index");
	exit;



});


$app->get("/signup", function(){

	$page = new Page();
	$page->setTpl("signup");
});
