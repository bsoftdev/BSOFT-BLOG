<?php 


use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;
use \Hcode\Model\Post;




$app->get("/admin/posts", function(){

	$page = new PageAdmin();
	$page->setTpl("posts",[
       
       "posts" => Post::listAll()
	]);
});

$app->get("/admin/post/create", function(){


	$page = new PageAdmin();
	$page->setTpl("post-create",[

        "postError" => Post::getError()
	]);
});


$app->post("/admin/post/create", function(){

	

   if (!isset($_POST['title']) || $_POST['title'] ==="") {
   	
   	 Post::setError("Escreva um Título para este post...");
   	 header("Location:/admin/post/create");
   	 exit;
   }

    if (!isset($_POST['content']) || $_POST['content'] ==="") {
   	
   	 Post::setError("Escreva o conteúdo do post...");
   	 header("Location:/admin/post/create");
   	 exit;
   }

    if (!isset($_POST['url']) || $_POST['url'] ==="") {
   	
   	 Post::setError("Escreva a url do post...");
   	 header("Location:/admin/post/create");
   	 exit;
   }


    $user = User::getFromSession();

    $post =  new Post();

    $_POST['iduser'] = $user->getiduser();
    $post->setData($_POST);
    $post->save();
    header("Location:/admin/post/create");
    exit;


});

