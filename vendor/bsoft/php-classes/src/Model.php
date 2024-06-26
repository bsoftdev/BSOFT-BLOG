<?php 

   namespace Hcode;

   /**
    * Model for getters and Setters
    */
   class Model{

   	private $values = [];
   	
      public function __call($name , $args){

      	$method  =  substr($name, 0,3);  #getting the first 3 letter to check if it's get or set
      	$fieldName = substr($name, 3, strlen($name)); #getting the last partion of letters to check what kind of value we get or set.

      	  

      	  switch ($method) {

      	  	case 'get':
      	  		return (isset($this->values[$fieldName]))?$this->values[$fieldName]:NULL; #WE USED THE VERIFYING TO KNOW IF THERE IS AN ID ON CAT MODEL ALREADY OR NOT
      	  		break;
      	  	
      	  	case "set":
      	  	     $this->values[$fieldName] = $args[0];
      	  		
      	  		break;
      	  }
      }


     #A FUNCTION TO GET ALL FIELDS FROM THE DATABASE
       public function setData($data = array()){

       	    foreach ($data as $key => $value) {
       	    	$this->{"set".$key}($value);
       	    }
       }

       public function getData(){
       	 return $this->values;
       }
   }


 ?>