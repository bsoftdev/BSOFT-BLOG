<?php 


use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;
use \Hcode\Model\Post;


#POST DASPLAY
$app->get("/admin/posts", function(){

   User::verifyLogin();

	 $search = (isset($_GET['search']))?$_GET['search']:"";
    $page = (isset($_GET['page']))? (int)$_GET['page']:1;

    if ($search != '') {

        $pagination = Post::getPageSearch($search, $page);
    }else{

       $pagination = Post::getPage($page);
    }
     $pages = [];

          for ($i=0; $i < $pagination['pages']; $i++){ 

              array_push($pages, [
                    'href'=>'/admin/posts?'.http_build_query([
                        'page'=>$i+1,
                        'search'=>$search
                    ]),

                    'text'=>$i+1
              ]);
          }
    $page = new PageAdmin();
    $page->setTpl("posts",[ 
      "posts"=>$pagination['data'],
        "search"=>$search,
        "pages"=>$pages
    ]);
});

#CREATING POST TEMPLATE
$app->get("/admin/post/create", function(){
  
   User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("post-create",[

        "postError" => Post::getError()
	]);
});

#EDITING POST TEMPLATE
$app->get("/admin/post/:idpost", function($idpost){

   User::verifyLogin();

     $post = new Post();
     $post->get((int)$idpost);

    $page = new PageAdmin();
    $page->setTpl("post-edit",[

        "postError" => Post::getError(),
        "post" => $post->getData()
    ]);
});


$app->get("/admin/post/:idpost/delete", function($idpost){

      User::verifyLogin();

   $post = new Post();
   $post->get((int)$idpost);
   $post->delete();
   header("Location:/admin/posts");
   exit;


});



#ROUTE TO CREATE POST
$app->post("/admin/post/create", function(){

	   User::verifyLogin();

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
    header("Location:/admin/posts");
    exit;


});


#ROUTE TO SAVE DATA EDITED
$app->post("/admin/post/:idpost", function($idpost){
    
   User::verifyLogin();

     $post = new Post();
     $post->get((int)$idpost);


    if (!isset($_POST['title']) || $_POST['title'] ==="") {
    
     Post::setError("Escreva um Título para este post...");
     header("Location:/admin/post/".$post->getidpost());
     exit;
   }

    if (!isset($_POST['content']) || $_POST['content'] ==="") {
    
     Post::setError("Escreva o conteúdo do post...");
     header("Location:/admin/post/".$post->getidpost());
     exit;
   }

    if (!isset($_POST['url']) || $_POST['url'] ==="") {
    
     Post::setError("Escreva a url do post...");
     header("Location:/admin/post/".$post->getidpost());
     exit;
   }


    $user = User::getFromSession();

    $post =  new Post();

    $_POST['iduser'] = $user->getiduser();
    $post->setData($_POST);
    $post->save();
    header("Location:/admin/posts");
    exit;


});

