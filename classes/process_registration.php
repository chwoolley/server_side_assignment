<?php
ob_start();
include ("db_manager.php");
include ("password_manager.php");





class New_Registration{
    
      
    
    public function __construct() {
    $user_email = $this->sanitize_user_input(
    $_POST["email"]); 
    
    $user_userName = $this->sanitize_user_input( $_POST["user_name"]);
      
    

      
    
    $passwordmanager = new PasswordManager(); 
        
        
     $user_password = $passwordmanager->set_password($_POST["new_password_from_form"]);
       
   
    
    $cms_db = new DB_connect();    
    $cms_db->create_new_user($user_email,$user_userName,$user_password);    
    header( "location:../login.php?registered");
     exit;
}


private function sanitize_user_input($str){
$temp = trim($str);
$temp  = filter_var( $temp , FILTER_SANITIZE_STRING );
return $temp;
    }   
    
    
    
}

new New_Registration();
?>