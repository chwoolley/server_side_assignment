<?php
#include("../includes/constants.php");
define("HOST", "127.0.0.1");
define("USER", "root");
define("PASSWORD", "abc123");
define("DATABASE", "carl_cms");

class DB_Connect{
    
    private $db;
    private $hashed;
    
    
    public function __construct(){
        
        $this->db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        
        if($this->db->connect_error){
            die('Could not connect to database:<br><h4>Problem Could be' . $this->$db->connect_error . '</h4>');
            }
        else{
            
            
        }
        
    }
    
    private function my_escape($str){
        return $this->db->real_escape_string($str);
        
    }
    
    public function update_project_record($projectID, $groupID, $projectTitle, $projectDescription, $imagepath){
        $projectDescription = $this->my_escape($projectDescription); 
        $projectTitle = $this->my_escape($projectTitle);
    $sql = "UPDATE content SET group_id='$groupID', title='$projectTitle', description='$projectDescription',  image_path='$imagepath' WHERE (project_id=$projectID)";
    echo "update_project_record " . $sql;
        $this->db->query($sql);
        
    }
    
    
    public function  create_new_project_entry($groupid, $projectTitle, $projectDescription, $imagepath){
        $projectDescription = $this->my_escape($projectDescription);
        $projectTitle = $this->my_escape($projectTitle);
        $sql = "INSERT INTO content (project_id, group_id, title, description, image_path ) VALUES (NULL,'$groupid','$projectTitle','$projectDescription','$imagepath')";
     echo "create_new_project_entry" . $sql;

        $this->db->query($sql);
    }
    public function get_all_Project_Groups(){
        
        $sql ="SELECT * FROM categories ORDER BY group_code ASC";
        $result = $this->db->query($sql);
        $all_groups_array= [];
        
        if ( $result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){array_push($all_groups_array,[$row["group_code"],$row["category"], $row["title"], $row["description"], $row["filter"]]);
                                                  }
            
        }
        
        return $all_groups_array;
    }
    
    
    public function toggle_project_availability($projectid){
        
        $sql = "UPDATE content SET status=(CASE WHEN status='true' THEN 'false' ELSE 'true' END) WHERE project_id = $projectid";
        
        $result = $this->db->query($sql);
        return $this->db->affected_rows;
        
    }
    
    public function display_category_name($projectid){
        $sql = "SELECT categories.category, categories.group_code, content.group_id FROM  content, categories WHERE content.project_id = $projectid";
        
        
    }
    
    
    public function display_all_byStatus(){
        $sql = "SELECT * FROM content WHERE content.status LIKE 'true'";
        $result = $this->db->query($sql);
        $all_projects_bystatus_array= [];
        
        if ( $result && $result->num_rows > 0){
            while ($row = $result-> fetch_assoc()){array_push($all_projects_bystatus_array,[$row["project_id"],$row["group_id"], $row["title"], $row["description"], $row["image_path"], $row["sub_image_path"], $row["sub_image_path_1"],$row["status"] ,$row["filter"]]);
             }
        
    }
    return $all_projects_bystatus_array;    
        
    }
    public function display_all_Projects(){
        $sql ="SELECT * FROM content";
        $result = $this->db->query($sql);
        $all_projects_array = [];
        
        if( $result->num_rows > 0){
            
            while ($row = $result-> fetch_assoc()){array_push($all_projects_array,[$row["project_id"],$row["group_id"], $row["title"], $row["description"], $row["image_path"], $row["sub_image_path"], $row["sub_image_path_1"], $row["status"]]);
                                                                                   
            }
            
        }
        return $all_projects_array;
    }
    
    public function display_single_project($projectid){
    $sql = "SELECT * FROM content WHERE project_id = $projectid";
    $result = $this->db->query($sql);    
    $temp_array = [];    
    
    if( $result && $result->num_rows == 1){
        while($row = $result->fetch_assoc()){
            array_push($temp_array, $row);
        }
    }
    return $temp_array;    
    }
    public function create_new_user($user_email,$user_userName,$user_password){
      $sql = "INSERT INTO users (user_id, email, user_name, password ) VALUES (NULL, '$user_email', '$user_userName', '$user_password')";  
        echo "create_new_user" . $sql;
        $result = $this->db->query($sql);
       
        
}
    
  public function get_password($username){
        $stored_password = "";
        $sql = "SELECT * FROM users WHERE users.user_name = '$username'";
        $result = $this->db->query($sql);
        
        // should only be one record
        if ($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $stored_password = $row["password"];
        }
        
        //dump_object_vars($this->db);
        return $stored_password;
    }  
    
    
    
}