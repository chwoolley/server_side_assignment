<?php

class PasswordManager {

    public function __construct(){
        //echo "hello from " . __CLASS__;
    }

    public function set_password($password){
        $hashed = password_hash( $password,  PASSWORD_DEFAULT );
        return $hashed;
    }
    
    public function check_password($plainPassword, $hashedPassword){
        $is_matched = password_verify( $plainPassword , $hashedPassword);
        return $is_matched;
    }

}


?>