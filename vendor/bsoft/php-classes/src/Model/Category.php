<?php 
   
   namespace Hcode\Model;

   use \Hcode\DB\Sql;
   use \Hcode\Model;


   class Category extends Model{

    const ERROR_CATEGORY = "catError";

      public static function listAll(){

         $sql = new Sql();
         return $sql->select("SELECT * FROM categories ORDER BY idcategory DESC");

      }

      #METHOD FOR CREATING CATEGORIES
      public function save(){

        $sql = new Sql();

        $results = $sql->select("CALL sp_categories(:idcategory, :category)", [
            ":idcategory"=>$this->getidcategory(),
            ":category"=>$this->getcategory()
        ]);

         if (count($results) > 0) {

              $this->setData($results[0]);
         }

        Category::updateFile();#CALLING THE METHOD TO UPDATE CATEGORIES
      }


      #GETTING THE DATA OF A SPECIFIC  CATEGORY
     public function get($idcategory){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM categories WHERE idcategory =:idcategory", [

            ":idcategory"=>$idcategory
        ]);
      
       if (count($results) > 0) {
        $this->setData($results[0]);
       }
        
     }


     #DELETING THE CATEGORY
     public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM categories WHERE idcategory =:idcategory", [

            ":idcategory"=>$this->getidcategory()
        ]);

      Category::updateFile();#CALLING THE METHOD TO UPDATE CATEGORIES

     }


     #METHOD TO SET CATEGORIES ON CLIENTS TAMPLETS
     public static function updateFile(){

       $category  = Category::listAll();
       $html = [];

       foreach($category as $cat) {
          array_push($html, '<li class ="nav-item mb-2"><a class="nav-link p-0 text-body-secondary" href="/categories/'.$cat['idcategory'].'">'.$cat['category'].'</a></li>');
       }

       file_put_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."categories-menu.html", implode('',$html));
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


     #METHOD TO RELATE A PRODUCT DO A CATEGORY
     public function addProduct(Product $product){

      $sql = new Sql();

      $sql->query("INSERT INTO tb_productscategories (idcategory, idproduct) VALUES (:idcategory, :idproduct)",[

          ":idcategory"=>$this->getidcategory(),
          ":idproduct"=>$product->getidproduct()
      ]);


     }


     #METHOD TO REMOVE A PRODUCT RELATED TO A CATEGORY
     public function removeProduct(Product $product){

      $sql = new Sql();
      $sql->query("DELETE FROM tb_productscategories WHERE idcategory =:idcategory AND idproduct =:idproduct", [

          ":idcategory"=>$this->getidcategory(),
          ":idproduct"=>$product->getidproduct()
      ]);

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

        $_SESSION[Category::ERROR_CATEGORY] = $msg;
     }

     //GET ERROR
      public static function getError(){

        $msg = (isset($_SESSION[Category::ERROR_CATEGORY]) && $_SESSION[Category::ERROR_CATEGORY]) ? $_SESSION[Category::ERROR_CATEGORY]:'';

        Category::clearError();

        return $msg;
      }

      //CLEAR ERROR

      public static function clearError(){

          $_SESSION[Category::ERROR_CATEGORY] = NULL;
      }



#THIS METHOD USED TO COUNT THE CATEGORIES
   public static function countCat(){

    $sql = new Sql();
    
    $totals = $sql->select("SELECT COUNT(idcategory) as totalCat FROM tb_categories");

    if (count($totals)  <=0 ) {
         $totals = 0;
    }else{
        $totals = $totals[0] ;
    }

   return $totals;
  }

   }

 ?>