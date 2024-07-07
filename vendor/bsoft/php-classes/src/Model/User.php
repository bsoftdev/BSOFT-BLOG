<?php 
   namespace Hcode\Model;
   
   use \Hcode\DB\Sql;
   use \Hcode\Model;
  

   class User extends Model{
   	

      const SESSION = "User";
      const ERROR = "UserError";
      const SUCCESS = "UserSuccess";
      const ERROR_REGISTER = "fErrorRegister";





      #Getting the user on session
      public static function getFromSession(){

        $user = new User();
        
        if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0){
            
            $user->setData($_SESSION[User::SESSION]);
        }

        return $user;

      }

      #SELECTING ALL THE USERS
     public static function listAll(){

      $sql = new Sql();

      return $sql->select("SELECT * FROM users INNER JOIN profiles USING(iduser) ORDER BY iduser DESC");
      
   }




      #CHECKING IF THE USER IS ON SESSION OR NOT
      public static function checkLogin($inadmin = true){

        if (
            !isset($_SESSION[User::SESSION])
            || 
            !$_SESSION[User::SESSION] 
            || 
            !(int)$_SESSION[User::SESSION]['iduser'] > 0
           ){

            //NOT LOGGED
            return false;
        }else{

            if ($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true) {

                return true;

            }else if($inadmin === false){

                return true;
                
            }else{

                return false;
            }
        }
      }


        
     

  
  #FUNCTION FOR LOGIN
    public static function login($login , $password){

        $sql = new Sql();

        $results = $sql->select("
            
            SELECT * 
            FROM users a 
            INNER JOIN  profiles b USING(iduser)
            WHERE a.email = :LOGIN OR a.phone =:LOGIN", array(

            ":LOGIN" =>$login
         ));
         
         if (count($results) === 0) {
              throw new \Exception("Usuário inexiste ou senha inválida.");
              
         }

         $data = $results[0];

         if(password_verify($password, $data['senha'])){
            
              $user = new User();
              $user->setData($data);
             
              $_SESSION[User::SESSION] = $user->getData();
              
              return $user;

         }else{
            throw new \Exception("Usuário inexiste ou senha inválida.");

         }
    }



    public static function logout(){

        $_SESSION[User::SESSION] = Null;
    }




  #function used  to verify if a user started a session or not.
      public static function verifyLogin($inadmin = true){

            if (!User::checkLogin($inadmin)){

                if ($inadmin) {
                    header("Location:/admin/login");
                }else{
                    header("Location:/login");
                }
                exit; 
            }

      }
     


      #function used to insert datas to database using procedure , this will instert into tb_persons and then to users to join them

      public function save(){

        $sql = new Sql();

        
        
        $results = $sql->select("CALL create_user_with_profile(:name, :senha, :email, :phone, :inadmin, :biography, :photo)",

            array(
                ":name"=>$this->getname(),
                ":senha"=>User::hashPassword($this->getsenha()),
                ":email"=>$this->getemail(),
                ":phone"=>$this->getphone(),
                ":inadmin"=>$this->getinadmin(),
                ":biography"=>$this->getbiography(), 
                ":photo"=>$this->getphoto() 
            ));


            if (count($results) > 0) {
                
                 $this->setData($results[0]);
            }
           
      }



      #function for getting a single  user
      public function get($iduser){

          $sql = new Sql();

          $results = $sql->select("SELECT * FROM users INNER JOIN profiles USING(iduser) WHERE users.iduser =:iduser",
            array(
                ":iduser"=>$iduser
        ));

          $this->setData($results[0]);
      }



      #FUNCTION TO UOPDTE USERS
      public function update(){

       $sql = new Sql();
        
        $results = $sql->select("CALL update_user_and_profile(:iduser, :name, :senha, :email, :phone, :inadmin, :biography, :photo)",

            array(
                ":iduser"=>$this->getiduser(),
                ":name"=>$this->getname(),
                ":senha"=>$this->getsenha(),
                ":email"=>$this->getemail(),
                ":phone"=>$this->getphone(),
                ":inadmin"=>$this->getinadmin(),
                ":biography"=>$this->getbiography(),
                ":photo"=>$this->getphoto() 
            ));

        if (count($results) > 0) {
            $this->setData($results[0]);
        }
       }


       #FUNCTION TO DELETE A USER
      public function delete(){

          $sql = new Sql();
          $sql->query("CALL DeleteUser(:iduser)",
            array(
                 ":iduser"=>$this->getiduser()
            ));
      }


 #METHOD TO CHECK IF THE PHOTO OF THE PRODUCT EXISTS OR NOT
public function checkPhoto(){

         if (file_exists(

            $_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR.
            "resource".DIRECTORY_SEPARATOR.
            "site".DIRECTORY_SEPARATOR.
            "images".DIRECTORY_SEPARATOR.
            "users".DIRECTORY_SEPARATOR.
            $this->getiduser().".jpg"

         )) {
            
            $url = "/resource/site/images/users/".$this->getiduser().".jpg";

         }else{
            $url = "/resource/site/images/users/cleep.jpg";
         }

         
         return $this->setphoto($url);
     }



      public function getData(){

      $this->checkPhoto();
       $data = parent::getData();

       return $data;
     }


     

      public function setPassword($password){

        $sql = new Sql();

        $sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", [
            ":password"=>$password,
            ":iduser"=>$this->getiduser()
        ]);
      }

      //METHOD FOR ERROR WHEN AUTHENTICATING OR CREATING A USER

      public static function setError($msg){
         $_SESSION[User::ERROR] = $msg;
      }

      //METHOD USED TO GET THE ERROR FROM THE SESSION
      public static function getError(){
        $msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

        User::clearError();

        return $msg;
      }

      //METHOD USED TO CLEAR THE ERROR FROM THE SESSION
      public static function clearError(){
        $_SESSION[User::ERROR] = NULL;
      }



      //THESE METHODS BELOW ARE USED TO CATCH AND SER ERROR ON USERS REGISTER TAMPLETE

     public static function setErrorRegister($msg){

        $_SESSION[User::ERROR_REGISTER] = $msg;
     }

     //GET ERROR
      public static function getErrorRegister(){

        $msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER]:'';

        User::clearErrorRegister();

        return $msg;
      }

      //CLEAR ERROR

      public static function clearErrorRegister(){

          $_SESSION[User::ERROR_REGISTER] = NULL;
      }

      //THIS METHOD IS USED TO CHECK WHEN A CLIENT IS REGESTERING , DISPLAY AN ERROR if the email-login already exists
      public static function checkLoginExists($email){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM users WHERE email = :email", [
         
         ':email'=>$email

        ]);

        return (count($results) > 0);
      }


      //METHOD USED TO SET THE MESSAGE OF SUCCESS

      public static function setSuccess($msg){
         $_SESSION[User::SUCCESS] = $msg;
      }

      //METHOD USED TO GET THE  MESSAGE OF SUCCESS FROM THE SESSION
      public static function getSuccess(){
        $msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

        User::clearSuccess();

        return $msg;
      }

      //METHOD USED TO CLEAR THE MESSAGE OF SUCCESS  FROM THE SESSION
      public static function clearSuccess(){
        $_SESSION[User::SUCCESS] = NULL;

     }

      //CREATING HASH FOR THE PASSWORD
      public static  function hashPassword($password){

        $password = password_hash($password, PASSWORD_DEFAULT);
        
        return $password;

      }


      


#METHOD FOR USERS PAGINATION
public static function getPage($page = 1, $itemsPerPage = 10){
  
      $start = ($page - 1) * $itemsPerPage;

     $sql = new Sql();

     $results = $sql->select("
            SELECT  SQL_CALC_FOUND_ROWS * 
            FROM tb_users a
            INNER JOIN tb_persons b USING(idperson) 
            ORDER BY b.desperson
            LIMIT $start,$itemsPerPage;");
    

         #GETTING THE TOTAL NUMBER OF THE CATEGORY
        $resultsTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" =>$results,
            "total"=>(int)$resultsTotal[0]["nrtotal"],
            "pages" =>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)

        ];
     }


#METHOD FOR USERS SEARCHING
public static function getPageSearch($search, $page = 1, $itemsPerPage = 10){
  
      $start = ($page - 1) * $itemsPerPage;

     $sql = new Sql();

     $results = $sql->select("
            SELECT  SQL_CALC_FOUND_ROWS * 
            FROM tb_users a
            INNER JOIN tb_persons b USING(idperson) 
            WHERE b.desperson LIKE :search OR b.desemail = :search OR a.deslogin LIKE :search OR a.dtregister LIKE :search
            ORDER BY b.desperson
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


  
     




}
 ?>