<?php 

//USED TO VERIFY LOGIN ON THE TAMPLATES CAUSE IT'LL BE I GLOBSL SCOPE
    function checkLogin($inadmin = true){
    	return User::checkLogin($inadmin);
    }


    //USED TO GET USERNAME FROM THE SESSION TO BE USED ON THE TAMPLATES.
    function getUserName(){

        $user = User::getFromSession();
        return $user->getname();
    }
