<?php 


use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;


$app->get("/admin/users", function(){
	
	User::verifyLogin();

	  $search = (isset($_GET['search']))?$_GET['search']:"";
    $page = (isset($_GET['page']))? (int)$_GET['page']:1;

    if ($search != '') {

        $pagination = User::getPageSearch($search, $page);
    }else{

       $pagination = User::getPage($page);
    }
     $pages = [];

          for ($i=0; $i < $pagination['pages']; $i++){ 

              array_push($pages, [
                    'href'=>'/admin/users?'.http_build_query([
                        'page'=>$i+1,
                        'search'=>$search
                    ]),

                    'text'=>$i+1
              ]);
          }
    $page = new PageAdmin();
    $page->setTpl("users",[ 
    	"users"=>$pagination['data'],
        "search"=>$search,
        "pages"=>$pages
    ]);

});


#GETTING THE CREATE USER PAGE
$app->get("/admin/users/create", function(){
	
    User::verifyLogin();
     $page = new PageAdmin();
     $page->setTpl("register", [
        
         "registerError"=>User::getError()
     ]);
});

#ROUTE TO CREATE USER
$app->post("/admin/users/create", function(){

	     

	         User::verifyLogin();

			if (!isset($_POST['name']) || $_POST['name'] === "") {
				User::setError("Preencha o nome.");
				header("Location: /admin/users/create");
				exit;
			}

			if (!isset($_POST['email']) || $_POST['email'] ==="") {
				User::setError("Preencha o email");
				header("Location: /admin/users/create");
				exit;
			}

			if (!isset($_POST['phone']) || $_POST['phone'] ==="") {
				User::setError("Informe o o número de telefone.");
				header("Location: /admin/users/create");
				exit;
			}
			if (!isset($_POST['senha']) || $_POST['senha'] ==="") {
				User::setError("Digite a senha.");
				header("Location: /admin/users/create");
				exit;
			}


			if (User::checkLoginExists($_POST['email']) === true) {
				User::setError("Este E-mail ja está sendo ulitizado por outro utilizador");
				header("Location: /admin/users/create");
				exit;
			}

  
       
          $_POST['inadmin'] = isset($_POST['inadmin'])?1:0;

          $user = new User();
          $user->setData($_POST);
          $user->save();
          header("Location: /admin/users");
          exit;
});


$app->get("/admin/users/:iduser/delete", function($iduser){
	
	   User::verifyLogin();

       $user = new User();
       $user->get((int)$iduser);
       $user->delete();
       header("Location: /admin/users");
       exit;

});


$app->get("/admin/users/:iduser", function($iduser){
	User::verifyLogin();

	     $user = new User();
	     $user->get((int)$iduser);

 		
	   $page = new PageAdmin();

	   $page->setTpl("user_edit", [

	   		"user"=>$user->getData(),
	   		"updateError"=>User::getError(),
	   		"updateSuccess"=>User::getSuccess()
	   ]);
});

#ROUTE TO SEND DATA TO BE UPATED
$app->post("/admin/users/:iduser", function($iduser){

	User::verifyLogin();
    
         $user = new User();
         $user->get((int)$iduser);
        


		if (!isset($_POST['name']) || $_POST['name'] === "") {
			User::setError("Preencha o nome.");
			header("Location: /admin/users/".$user->getiduser());
			exit;
		}

		if (!isset($_POST['email']) || $_POST['email'] ==="") {
			User::setError("Preencha o email");
			header("Location: /admin/users/".$user->getiduser());
			exit;
		}

		if (!isset($_POST['phone']) || $_POST['phone'] ==="") {
			User::setError("Informe o número de telefone.");
			header("Location: /admin/users/".$user->getiduser());
			exit;
		}


		$_POST['inadmin'] = isset($_POST['inadmin'])?1:0;
		 $user->setData($_POST);
		 $user->update($_POST);



           if (!(isset($_FILES['photo']['tmp_name'])) || empty($_FILES['photo']['tmp_name'])) {
                User::setError("Os Dados foram atualizados, mas a foto de perfil continua a mesma.");
			header("Location: /admin/users/".$user->getiduser());
			exit;
           }else{

       
           	$user->setPhoto($_FILES["photo"]);
           	header("Location: /admin/users".$user->getiduser());
           	exit;
           }
});

