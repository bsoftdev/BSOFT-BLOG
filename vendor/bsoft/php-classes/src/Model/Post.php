<?php 
   
   namespace Hcode\Model;

   use \Hcode\DB\Sql;
   use \Hcode\Model;


   class Post extends Model{

    const POST_ERROR = "postError";

      public static function listAll(){

         $sql = new Sql();
         return $sql->select("SELECT posts.*, users.iduser users.name FROM posts INNER JOIN users USING(iduser) ORDER BY idpost DESC");

      }


      public static function featured(){

         $sql = new Sql();
         return $sql->select("SELECT posts.*, users.iduser, users.name FROM posts INNER JOIN users USING(iduser) ORDER BY idpost ASC LIMIT 3");

      }

      #RECENT POSTS
       public static function recentPosts(){

         $sql = new Sql();
         return $sql->select("SELECT posts.*, users.iduser, users.name FROM posts INNER JOIN users USING(iduser) ORDER BY idpost DESC LIMIT 3");

      }

        #RECENT POSTS column 2
       public static function recentPostsColum2(){

         $sql = new Sql();
         return $sql->select("SELECT posts.*, users.iduser, users.name FROM posts INNER JOIN users USING(iduser) ORDER BY idpost DESC LIMIT 3 OFFSET 3");

      }

      #RECENT POSTS
       public static function asidePost(){

         $sql = new Sql();
         $aside = $sql->select("SELECT posts.*, users.iduser, users.name FROM posts INNER JOIN users USING(iduser) ORDER BY idpost DESC LIMIT 1");
         return $aside[0];

      }


      #METHOD FOR CREATING CATEGORIES
      public function save(){


        $sql = new Sql();

        $results = $sql->select("CALL sp_posts(:idpost, :title, :content, :image, :url, :iduser )", [
            ":idpost"=>$this->getidpost(),
            ":title"=>$this->gettitle(),
            ":content"=>$this->getcontent(),
            ":image"=>$this->getimage(),
            ":url"=>$this->geturl(),
            ":iduser"=>$this->getiduser()
        ]);

         if (count($results) > 0) {

              $this->setData($results[0]);
         }
      }

    #GETTING THE DATA OF A SPECIFIC  ID POST
     public function get($idpost){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM posts WHERE idpost =:idpost", [

            ":idpost"=>$idpost
        ]);
      
       if (count($results) > 0) {

        $this->setData($results[0]);
       }
        
     }

    #GETTING THE DATA OF A SPECIFIC  POST BY URL
     public function getlink($url){

        $sql = new Sql();

        $results = $sql->select("SELECT posts.*, users.iduser,users.name FROM posts INNER JOIN users USING(iduser) WHERE url =:url", [

            ":url"=>$url
        ]);
      
       if (count($results) > 0) {

        $this->setData($results[0]);
       }
        
     }

     #DELETING THE CATEGORY
     public function delete(){

        $sql = new Sql();

        $sql->query("CALL deletePost(:idpost)", [

            ":idpost"=>$this->getidpost()
        ]);
     }


#METHOD FOR POSTS PAGINATION
public static function getPage($page = 1, $itemsPerPage = 6){
  
      $start = ($page - 1) * $itemsPerPage;

     $sql = new Sql();

     $results = $sql->select("
            SELECT  SQL_CALC_FOUND_ROWS * , posts.*, users.iduser, users.name
            FROM posts 
            INNER JOIN users USING(iduser)
            ORDER BY posts.idpost DESC
            LIMIT $start,$itemsPerPage;");
    

         #GETTING THE TOTAL NUMBER OF THE CATEGORY
        $resultsTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" =>$results,
            "total"=>(int)$resultsTotal[0]["nrtotal"],
            "pages" =>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)

        ];
     }


#METHOD FOR POST SEARCHING
public static function getPageSearch($search, $page = 1, $itemsPerPage = 10){
  
      $start = ($page - 1) * $itemsPerPage;

     $sql = new Sql();

     $results = $sql->select("
            SELECT  SQL_CALC_FOUND_ROWS * , posts.*, users.name
            FROM posts
            INNER JOIN users USING(iduser)
            WHERE posts.title LIKE :search OR posts.url LIKE :search OR posts.dtregister LIKE :search
            ORDER BY posts.idpost DESC
            LIMIT $start,$itemsPerPage;", [
                ':search'=>'%'.$search.'%'
            ]);
    

         #GETTING THE TOTAL NUMBER OF THE CATEGORY
        $resultsTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" =>$results,
            "total"=>(int)$resultsTotal[0]["nrtotal"],
            "pages" =>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)

        ];
     }



#SET THE ERROR
      public static function setError($msg){

        $_SESSION[Post::POST_ERROR] = $msg;
     }

     //GET ERROR
      public static function getError(){

        $msg = (isset($_SESSION[Post::POST_ERROR]) && $_SESSION[Post::POST_ERROR]) ? $_SESSION[Post::POST_ERROR]:'';

        Post::clearError();

        return $msg;
      }

      //CLEAR ERROR

      public static function clearError(){

          $_SESSION[Post::POST_ERROR] = NULL;
      }



#THIS METHOD USED TO COUNT THE CATEGORIES
   public static function countCat(){

    $sql = new Sql();
    
    $totals = $sql->select("SELECT COUNT(idpost) as totalCat FROM possts");

    if (count($totals)  <=0 ) {
         $totals = 0;
    }else{
        $totals = $totals[0] ;
    }

   return $totals;
  }

   }

 ?>