<?php 

use \Hcode\Page;
use \Hcode\Model\User;
use \Hcode\Model\Post;
use \Hcode\Model\Comment;


$app->get('/', function() {


	  $page = new Page();
	  $page->setTpl("index",[

	  	"posts"=>Post::recentPosts(),
	  	"featured"=>Post::featured(),
	  	"asidePost"=>Post::asidePost(),
	  	"recentPostsColum2"=>Post::recentPostsColum2(),
	  ]
	);

});

#DISPLAYING ALL POST COMMENTS


#ROUTE TO INSERT COMMENTS
$app->post("/post/comments/:idpost", function($idpost){
    
     $post = new Post();
     $post->get((int)$idpost);

     $user = User::getFromSession();
     $user->get((int)$user->getiduser());

     $comment = new Comment();
     $comment->setData([
     	 "content"=>$_POST['content'],
     	 "iduser"=>$user->getiduser(),
     	 "idpost"=>$post->getidpost()
     ]);

     $comment->save();
     header("Location:/posts/".$post->geturl());	
     exit;

});


#LOGIN ROUTE PAGE
$app->get('/login', function() {

  
	  $page = new Page();
	  $page->setTpl("login",[

	  		 "loginError" =>User::getError()
	  ]);

});


$app->get("/logout", function(){

	 User::verifyLogin(false);
	 User::logout();
	 header("Location:/login");
	 exit;

});

$app->post("/register", function(){

	    $user = new User();

	    if (!isset($_POST['name']) || $_POST['name'] === "") {
				User::setError("Preencha o nome.");
				header("Location: /signup");

				exit;
			}

			if (!isset($_POST['email']) || $_POST['email'] ==="") {
				User::setError("Preencha o email");
				header("Location: /signup");
				exit;
			}

			if (!isset($_POST['phone']) || $_POST['phone'] ==="") {
				User::setError("Informe o o número de telefone.");
				header("Location: /signup");
				exit;
			}
			if (!isset($_POST['senha']) || $_POST['senha'] ==="") {
				User::setError("Digite a senha.");
				header("Location: /signup");
				exit;
			}

			if (User::checkLoginExists($_POST['email']) === true) {
				User::setError("Este E-mail ja está sendo ulitizado por outro utilizador");
				header("Location: /signup");
				exit;
			}

	    $user->setData([

        "name" =>$_POST['name'],
        "senha"=>$_POST['senha'],
        "email"=>$_POST['email'],  
        "phone"=>$_POST['phone'],
        "inadmin"=>0,
	    ]);

	    $user->save();
	    User::login($user->getphone(), $user->getsenha());
	    header("Location:/");
	    exit;
});


$app->post("/login", function(){

	try {

	    User::login($_POST["phone"], $_POST['senha']);
	    header("Location:/");
	    exit;
		
	} catch (Exception $e) {
		User::setError($e->getMessage());
	  header("Location:/login");
	}
	exit;

});


$app->get("/signup", function(){

	$page = new Page();
	$page->setTpl("signup", [

	  	"loginError"=>User::getError()
      
	]);
});

#SINGLE POST
$app->get("/posts/:url", function($url){
   
   $post = new Post();
   $post->getlink($url);


   $page = new Page();
   $page->setTpl("single_post", [

      "post"=>$post->getData(),
      "posts"=>Post::recentPosts(),
      "comments"=>Comment::listAll($post->getidpost())
   ]);
});