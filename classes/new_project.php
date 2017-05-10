<?php
ob_start();
include_once("db_manager.php");
include_once("file_manager.php");

class new_Project{
    private $is_new_image;
    private $db_imagepath_to_update;
    
     
    public function __construct(){
        $groupid = $_POST["form_groupID"];
        $projectTitle = $this->sanitize_user_input($_POST["form_projectTitle"]);
        $projectDescription = $this->sanitize_user_input($_POST["form_projectDescription"]);
        
   
       
        if ( is_array($_FILES) && isset($_FILES['form_fileupload']) && strlen($_FILES['form_fileupload']['name'])) {
            
            $fileop = new File_Manager($_FILES['form_fileupload']);
            
           
            $this->db_imagepath_to_update = $fileop->get_new_file_name();
            }

        
        $content_db = new DB_connect();
        $content_db->create_new_project_entry($groupid, $projectTitle, $projectDescription, $this->db_imagepath_to_update);
        header( "location: ../admin.php");
        exit;
    }
    
    private function sanitize_user_input($str){
        $temp = trim($str);
        $temp  = filter_var( $temp , FILTER_SANITIZE_STRING );
        return $temp;
    }
    
} #end of class

new new_Project();

?>