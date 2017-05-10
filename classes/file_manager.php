<?php
ob_start();
class File_Manager
    
{
private $filedestination = '../assets/img/';
private $fileName = '';
private $maxSize = '1048576'; // bytes (1048576 bytes = 1 meg)
private $allowedExtensions =  array(
'image/jpeg',
'image/jpg',
'image/png',
'image/gif'
); 
private $error = '';
private $image_information_array = [];    // to be used later if need be

public function __construct($file)
{
    
    $infoarr = getimagesize($file["tmp_name"]);
    
    //store image info for easy access
    $this->image_info_arr =['width' => $infoarr[0], 'height' => $infoarr[1], 'mime' => $infoarr['mime']];
    
    $this->validate($file);
    
    if ($this->error == '') {
        
        $this->fileName = $file['name'];
        move_uploaded_file($file['tmp_name'], $this->filedestination . $this->fileName) or die ('Destination Directory has a permission error.<br/>');
    }
    
    else {
        
        echo $this->error;
    }
}
    
public function get_new_file_name(){
     if ($this->error == '' ){
         return $this->fileName;
         }
    
    return '';
    
}
    
public function set_max_file_size($bytes){
    
    $this->maxSize = $bytes;
}    
    
// Private validation:
    
    private function validate($file)
    {// append to errors string as we go
        
    $error= '';
        
    //check file size
        
    if ($file['size'] > $this->maxSize){
        $error.= 'Max File Size Exceeded. Limit:' . $this->maxSize . 'bytes.<br />';
        }    
    $this->error = $error; 
        
    }
     
} //end of class
    
?>