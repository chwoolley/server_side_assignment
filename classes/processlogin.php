<?php
session_start();
ob_start();
include ("db_manager.php");
include ("password_manager.php");
include ("session_manager.php");


class New_Login{
    
      
    
    public function __construct() {

    $db = new DB_connect();  
    $passwordmanager = new PasswordManager(); 
        
    $user_name = $this->sanitize_user_input($_POST["username_from_form"]); 
        
        
    $user_password = ($_POST["password_from_form"]);
       
   
    $stored_password = $db->get_password($user_name);
     
    $verified = $passwordmanager->check_password($user_password, $stored_password);
     echo $verified ? "true" : "false";
 
     if (isset($_POST["submit-login"]) &&  !empty($_POST["username_from_form"]) && !empty($_POST["password_from_form"]) && ($verified)){
         $sm = new Session_Manager();
         $sm->update_Verified_User($user_name);
         header( "location: ../admin.php");
         exit;
     }
     else{
         header( "location: ../login.php");
         exit;
     }    
        
}


private function sanitize_user_input($str){
$temp = trim($str);
$temp  = filter_var( $temp , FILTER_SANITIZE_STRING );
return $temp;
    }   
    
    
    
}

new New_login();
?>