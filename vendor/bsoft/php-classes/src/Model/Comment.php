<?php 
   
   namespace Hcode\Model;

   use \Hcode\DB\Sql;
   use \Hcode\Model;
   use \Hcode\Model\Post;


   class Comment extends Model{

    const COMMENT_ERROR = "commentError";

      public static function listAll($idpost){

         $sql = new Sql();
         return $sql->select("SELECT comments.*, users.name 
            FROM comments 
            INNER JOIN users USING(iduser) 
            INNER JOIN posts USING(idpost) WHERE comments.idpost = :idpost
             ORDER BY comments.idcomment DESC", [
               ":idpost"=>$idpost
             ]);

      }


      #METHOD FOR CREATING COMMENTS
      public function save(){

        $sql = new Sql();

        $results = $sql->select("CALL InsertOrUpdateComment(:idcomment, :content, :idpost, :iduser )", [
            ":idcomment"=>$this->getidcomment(),
            ":content"=>$this->getcontent(),
            ":idpost"=>$this->getidpost(),
            ":iduser"=>$this->getiduser()
           
        ]);

         if (count($results) > 0) {

              $this->setData($results[0]);
         }
      }

    #GETTING THE DATA OF A SPECIFIC  ID COMMENT
     public function get($idcomment){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM comments WHERE idcomment =:idcomment", [

            ":idcomment"=>$idcomment
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