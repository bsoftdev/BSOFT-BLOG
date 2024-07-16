<?php 


use\Hcode\Model\User;

//USED TO VERIFY LOGIN ON THE TAMPLATES CAUSE IT'LL BE I GLOBSL SCOPE
    function checkLogin($inadmin = true){
    	return User::checkLogin($inadmin);
    }


    function hidenMenu(){
        if (isset($_SESSION[User::SESSION]) AND $_SESSION[User::SESSION] !== "") {
           return false;
        }else{
            return true;
        }
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

       date_default_timezone_set('Africa/Luanda');

        // Define the local to Portugal Portuguese
        setlocale(LC_TIME, 'pt_PT.UTF-8', 'portuguese');

        // Your timestamp (example)

        $timestamp = strtotime($date);

        // Formatted
        $data_formatada = strftime('%d de %B %Y', $timestamp);

        // Converte o primeiro caractere da string para maiúsculo
        $data_formatada = ucfirst($data_formatada);

        return $data_formatada;
    }



 function clean($content) {
    // Remove tags HTML e PHP
    $cleanData = $content;

    // Remove espaços extras no início e no fim da string
     

    return  $cleanData;
}

function limitText($texto, $limite = 80) {
    // Verifica se o texto é maior que o limite

       $cleanText = ($texto);

    if (mb_strlen($cleanText) > $limite) {
        // Trunca o texto ao limite e adiciona "..."
        $textoTruncado = mb_substr($cleanText, 0, $limite) . '...';
    } else {
        // Se o texto for menor ou igual ao limite, retorna o texto original
        $textoTruncado = $cleanText;
    }

    return $textoTruncado;
}