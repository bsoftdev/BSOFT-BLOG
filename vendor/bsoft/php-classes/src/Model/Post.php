<?php 
   
   namespace Hcode\Model;

   use \Hcode\DB\Sql;
   use \Hcode\Model;


   class Post extends Model{

    const POST_ERROR = "postError";

      public static function listAll(){

         $sql = new Sql();
         return $sql->select("SELECT * FROM posts INNER JOIN users USING(iduser) ORDER BY idpost DESC");

      }


      public static function featured(){

         $sql = new Sql();
         return $sql->select("SELECT * FROM posts INNER JOIN users USING(iduser) ORDER BY idpost ASC LIMIT 3");

      }

      #RECENT POSTS
       public static function recentPosts(){

         $sql = new Sql();
         return $sql->select("SELECT * FROM posts INNER JOIN users USING(iduser) ORDER BY idpost DESC LIMIT 4");

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

        $results = $sql->select("SELECT * FROM posts INNER JOIN users USING(iduser) WHERE url =:url", [

            ":url"=>$url
        ]);
      
       if (count($results) > 0) {

        $this->setData($results[0]);
       }
        
     }



     #DELETING THE CATEGORY
     public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM posts WHERE idpost =:idpost", [

            ":idpost"=>$this->getidpost()
        ]);

      
     }



     #METHOD TO GET THE PRODUCTS RELATED TO A SPECIFIC CATEGORY, E THOSE THAT ARE NOT.
     public function getProducts($related = true){

      $sql = new Sql();

      if ($related === true) {

           return $sql->select("
                  SELECT * 
                        FROM tb_products 
                        WHERE idproduct IN(
                        SELECT a.idproduct 
                        FROM  tb_products a 
                        INNER JOIN tb_productscategories b 
                        ON a.idproduct = b.idproduct
                        WHERE b.idcategory =:idcategory
                     );", [
                           ":idcategory"=>$this->getidcategory()

                        ]);

      }else{

         return $sql->select(" 
                     SELECT * FROM tb_products WHERE idproduct NOT IN(
                        SELECT a.idproduct 
                        FROM tb_products a 
                        INNER JOIN tb_productscategories b 
                        ON a.idproduct = b.idproduct
                        WHERE b.idcategory =:idcategory
                        );",[
                           ":idcategory"=>$this->getidcategory()
                     ]);
       }

     }



 #METHOD FOR PRODUCTS PAGINATION
public function getProductsPage($page = 1, $itemsPerPage = 8){
  
      $start = ($page - 1) * $itemsPerPage;

     $sql = new Sql();

     $results = $sql->select("
            SELECT  SQL_CALC_FOUND_ROWS * 
            FROM tb_products a 
            INNER JOIN tb_productscategories b ON a.idproduct = b.idproduct
            INNER JOIN tb_categories c ON c.idcategory = b.idcategory
            WHERE b.idcategory =:idcategory
            LIMIT $start,$itemsPerPage;

           ", [

              ':idcategory'=>$this->getidcategory()
           ]);
    

         #GETTING THE TOTAL NUMBER OF THE CATEGORY
        $resultsTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" =>Product::checkList($results),
            "total"=>(int)$resultsTotal[0]["nrtotal"],
            "pages" =>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)

        ];
     }



#METHOD FOR CATEGORY PAGINATION
public static function getPage($page = 1, $itemsPerPage = 10){
  
      $start = ($page - 1) * $itemsPerPage;

     $sql = new Sql();

     $results = $sql->select("
            SELECT  SQL_CALC_FOUND_ROWS * 
            FROM tb_categories 
            ORDER BY descategory
            LIMIT $start,$itemsPerPage;");
    

         #GETTING THE TOTAL NUMBER OF THE CATEGORY
        $resultsTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" =>$results,
            "total"=>(int)$resultsTotal[0]["nrtotal"],
            "pages" =>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)

        ];
     }


#METHOD FOR CATEGORY SEARCHING
public static function getPageSearch($search, $page = 1, $itemsPerPage = 10){
  
      $start = ($page - 1) * $itemsPerPage;

     $sql = new Sql();

     $results = $sql->select("
            SELECT  SQL_CALC_FOUND_ROWS * 
            FROM tb_categories
            WHERE descategory LIKE :search 
            ORDER BY descategory
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