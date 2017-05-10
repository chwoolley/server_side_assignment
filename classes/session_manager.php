<?php

class Session_Manager {

    public function __construct(){
        
    }

public function update_Verified_User($username){
    $_SESSION["verified"] = true;
    $_SESSION["username"] = $username;
    
}   


    
    

} #end class


?>