<?php
ob_start();
include_once("db_manager.php");
include_once("file_manager.php");

class Update_Project{
    private $is_new_image;
    private $db_imagepath_to_update;
    
    
    public function __construct(){
        $projectID = $_POST["form_projectID"];
        $groupID = $this->sanitize_user_input( $_POST["form_groupID"]);
        $projectTitle = $this->sanitize_user_input($_POST["form_projectTitle"]);
        $projectDescription = $this->sanitize_user_input($_POST["form_projectDescription"]);
        
 
        if ( is_array($_FILES) && isset($_FILES['form_fileupload'])&& strlen($_FILES['form_fileupload']['name'])) {
            $fileop = new File_Manager($_FILES['form_fileupload']);
            
            
            
            $this->db_imagepath_to_update = $fileop->get_new_file_name();
            }
        
        
        if( ($this->db_imagepath_to_update == '') OR empty($this->db_imagepath_to_update)){
     
        $this->db_imagepath_to_update = $_POST['form_file_original'];    
        
        }
        
        $content_db = new DB_connect();
        $content_db->update_project_record($projectID,$groupID, $projectTitle, $projectDescription,$this->db_imagepath_to_update);
         header( "location: ../edit-project.php?projectid="."$projectID"); 
    }
    
    private function sanitize_user_input($str){
        $temp = trim($str);
        $temp  = filter_var( $temp , FILTER_SANITIZE_STRING );
        return $temp;
    }
    
} #end of class

new Update_Project();

?>