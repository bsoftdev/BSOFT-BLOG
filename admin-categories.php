<?php 


use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;



$app->get("/admin/categories", function(){
	
		User::verifyLogin();

		
	  $page = new PageAdmin();
	  $page->setTpl("categories",[

        "categories" => Category::listAll()

	  ]);
});
#ROUTE TO CREATE CATEGORIE
$app->get("/admin/categories/create", function(){

    User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("category-create",[
       "categoryError"=>Category::getError(),
	]);

});

#ROUTE TO CREATE CATEGORIE
$app->post("/admin/categories/create", function(){

	User::verifyLogin();

	$category = new Category();

	$page = new PageAdmin();
	
	if (!isset($_POST['category']) || $_POST['category'] === "") {

		Category::setError("Digite o nome da categoria");
		header("Location: /admin/categories/create");
		exit;
	}

  $category->setData($_POST);
  $category->save();
  header("Location: /admin/categories");
  exit;

});


$app->get("/admin/categories/:idcategory/delete", function($idcategory){
	 
	   User::verifyLogin();


	   $category = new Category();
	   $category->get((int)$idcategory);
	   $category->delete();
	   header("Location: /admin/categories");
	   exit;
});


#ROUTE TO TEMPLETE TO EDIT CATEGORIES
$app->get("/admin/categories/:idcategory", function($idcategory){

    User::verifyLogin();

	$category = new Category();
	$category->get((int)$idcategory);
	$page = new PageAdmin();
	$page->setTpl("category-edit",[

		"category" => $category->getData(),
       "categoryError"=>Category::getError()
	]);

});

#ROUTE TO SAVE EDITED CATEGORIES
$app->post("/admin/categories/:idcategory", function($idcategory){

       User::verifyLogin();

	   $category = new Category();
	   $category->get((int)$idcategory);
	   $category->setData($_POST);
	   $category->save();
	   header("Location: /admin/categories");
	   exit;

});






