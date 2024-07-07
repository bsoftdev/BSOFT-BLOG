<?php 


use\Hcode\Model\User;

//USED TO VERIFY LOGIN ON THE TAMPLATES CAUSE IT'LL BE I GLOBSL SCOPE
    function checkLogin($inadmin = true){
    	return User::checkLogin($inadmin);
    }


    //USED TO GET USERNAME FROM THE SESSION TO BE USED ON THE TAMPLATES.
    function getUserName(){

        $user = User::getFromSession();
        return $user->getname();
    }
 
   //USED TO GET USERNAME FROM THE SESSION TO BE USED ON THE TAMPLATES.
    function getUserEmail(){

        $user = User::getFromSession();
        return $user->getemail();
    }


    function formatDate($date){
       return date("d-m-Y", strtotime($date));
    }

    function clean($content) {
    // Remove tags HTML e PHP
    $cleanData = strip_tags($content);

    // Remove espaços extras no início e no fim da string
     $cleanData = trim($cleanData);

    return  $cleanData;
}