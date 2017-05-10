<?
include ("../classes/db_manager.php");
include ("../classes/password_manager.php");





class New_Registration{
    
    public function __construct() {
    $user_email = $this->sanitize_user_input(
    $_POST["email"]); 
    
    $user_userName = $this->sanitize_user_input( $_POST["user_name"]);
      
    
    $user_password = $this->passwordmanager($_POST["new_password_from_form"]);
      
    
        
    $passwordmanager = new PasswordManager(); $passwordmanager->set_password();   
    
    $cms_db = new DB_connect();    
    $cms_db->create_new_user($user_email,$user_userName,$user_password);    
        
}


private function sanitize_user_input($str){
$temp = trim($str);
$temp  = filter_var( $temp , FILTER_SANITIZE_STRING );
return $temp;
    }   
    
    
    
}

new New_Registration();
?>