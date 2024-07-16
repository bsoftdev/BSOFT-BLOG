<?php 

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;


$app->get("/admin", function(){
	User::verifyLogin();
	$page = new PageAdmin();

});

#LOGIN ROUTE PAGE
$app->get('/admin/login', function() {

  
	  $page = new PageAdmin([
        
          "header"=>false,
          "footer"=>false
	  ]);
	  $page->setTpl("login",[

	  		 "loginError" =>User::getError()
	  ]);

});
 
$app->post('/admin/login', function(){

	try {

	    User::login($_POST["email"], $_POST["senha"]);
		
	} catch (Exception $e) {

		User::setError($e->getMessage());
	}
	header("Location: /admin");
	exit;

});
$app->get("/admin/logout", function() {
      User::verifyLogin();

	  User::logout();
	  header("Location:/admin/login");
	  exit;
});



