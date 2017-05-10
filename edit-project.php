<?php
ob_start();
include("./includes/header.php");

?>
 <?php if ( isset($_SESSION["verified"]) ):?>


<?php
$project_array = [];
if (isset($_GET["projectid"])){
    
    $project_array = $cms_DB->display_single_project($_GET["projectid"]);
    
}

?>



<div class="admin-content">
 <h1>Admin:edit</h1>
<div class="form-container">
<?php if (count($project_array)): ?>
<form action ="./classes/update_project.php" enctype="multipart/form-data"  method="post" id="project-details-form" class="new-project-form">
<fieldset>
   <input name="form_projectID" value="<?=$project_array[0]['project_id'];?>" type="hidden" />
    <img src="assets/img/<?=$project_array[0]['image_path'];?>">
    <input name="form_file_original" value="<?=$project_array[0]['image_path'];?>" >
    <input name="form_fileupload" type="file" value="">
    
</fieldset>

<fieldset>
<select name="form_groupID">
 <option selected disabled><?=$project_array[0]['group_id'];?></option> 
  <option value="1">Illustration</option>    
    <option value="2">Design</option>
    <option value="3">Tee Shirt Designs</option> 
     <option value="4">Web</option>
      <option value="5">Sketches</option>            
    </select>



<input type="text" name="form_projectTitle" value="<?=$project_array[0]['title'];?>"/>

<textarea name="form_projectDescription" form="project-details-form"><?=$project_array[0]['description'];?> </textarea>
<input type ="submit"/>
</fieldset>
    
     <a href="admin.php"><button>Finished Editing</button></a>
</form>
   
<?php else: ?><?php
    header( "Location: admin.php" );
    exit;
    ?>

<?php endif; ?>

<?php else: ?> 

   <?= header( "location:./index.php"); ?>
      
        
   <?php endif; ?> 

</div>
</div>


<?php
include("./includes/footer.php");

?>