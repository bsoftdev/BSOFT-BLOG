<?php 


use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;
use \Hcode\Model\Post;



$app->get("/admin/categories", function(){
	
	User::verifyLogin();
		
    $search = (isset($_GET['search']))?$_GET['search']:"";
    $page = (isset($_GET['page']))? (int)$_GET['page']:1;

    if ($search != '') {

        $pagination = Category::getPageSearch($search, $page);
    }else{

       $pagination = Category::getPage($page);
    }
     $pages = [];

          for ($i=0; $i < $pagination['pages']; $i++){ 

              array_push($pages, [
                    'href'=>'/admin/categories?'.http_build_query([
                        'page'=>$i+1,
                        'search'=>$search
                    ]),

                    'text'=>$i+1
              ]);
          }
    $page = new PageAdmin();
    $page->setTpl("categories",[ 
    	"categories"=>$pagination['data'],
        "search"=>$search,
        "pages"=>$pages
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


#ROUTE TO GET POSTS RELETED TO A CATEGORY --- TEMPLATE
$app->get("/admin/categories/:idcategory/posts", function($idcategory){
	User::verifyLogin();

  
  $category = new Category();
  $category->get((int)$idcategory);


  $page = new PageAdmin();
  $page->setTpl("categories-posts",[

  	  "category" =>$category->getData(),
  	  "reletedPosts" => $category->getPosts(),
  	  "noReletedPosts"=> $category->getPosts(false)
  ]);


});


#ROUTE TO RELATE POST TO A CATEGORY
$app->get("/admin/categories/:idcategory/post/:idpost/add", function($idcategory, $idpost){
	User::verifyLogin();

	   $category = new Category();
	   $category->get((int)$idcategory);

	   $post = new Post();
	   $post->get((int)$idpost);
	   $category->addPost($post);

	   header("Location: /admin/categories/".$idcategory."/posts");
	   exit;

});

   #ROUTE TO REMOVE POSTS RELATED TO A CATEGORY 
$app->get("/admin/categories/:idcategory/post/:idpost/remove", function($idcategory, $idpost){
	User::verifyLogin();  

	$category = new Category();
	$category->get((int)$idcategory);

	$post = new Post();
	$post->get((int)$idpost);
	$category->removePost($post);
	header("Location: /admin/categories/".$idcategory."/posts");
    exit;
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






