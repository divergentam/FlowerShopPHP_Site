<?php
    function text_validation($tekst){
        if(empty($tekst)){
            return "Molim Vas unesite vrednost, polje ne sme da bude prazno!";
        }elseif(strlen($tekst)>=50){
            return "Polje mora da sadrzi manje od 50 karaktera! (imate: " . strlen($tekst). " karaktera)";
        }elseif(!ctype_alpha(str_replace(" ", "", $tekst))){ 
            return "Polje sme da sadrzi samo slova i praznine!";
        }else{
            return false;
        }
    }

    function password_validation($pass){
        if(empty($pass)){
            return "Molim Vas unesite vrednost, polje ne sme da bude prazno!";
        }elseif(strlen($pass) < 5 || strlen($pass) > 25){
            return "Password treba da bude izmedju 5 i 25 karaktera!";
        }elseif(strlen(trim($pass)) != strlen($pass)){ // 
            return "Password ne sme sadrzati praznine i tabove!";
        }else{
            return false;
        }
    }

    function username_validation($username){
        if(empty($username)){
            return "Molim Vas unesite vrednost, polje ne sme da bude prazno!";
        }elseif(preg_match("/\s+/", $username)){
            return "Username ne sme sadrzati praznine i tabove!";
        }elseif(strlen($username) < 5 || strlen($username) > 50){
            return "Username treba da bude izmedju 5 i 25 karaktera!";
        }else{
            return false;
        }
    }

    function email_validation($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Nevazeci format email-a";
        }else{
            return false;
        }
    }

?>