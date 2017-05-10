<?php
ob_start();
include("./includes/header.php");

?>

<div class="admin-content">
<?php if ( isset($_SESSION["verified"]) ):?>   
    <h1>Admin:NEW</h1>
    <div class="form-container">
    <form action ="./classes/new_project.php" enctype="multipart/form-data" id="new-project-form" method="post" name="upload-new" class="new-project-form">

    <fieldset>
    <label>Select a group</label>    
    <select name="form_groupID" >
        <option selected disabled>Select type</option> 
  <option value="Illustration">Illustration</option>    
    <option value="Design">Design</option>
    <option value="Teedesign">Tee Shirt Designs</option> 
     <option value="Web">Web</option>
      <option value="Sketches">Sketches</option>            
    </select> 
    </fieldset>  
    <fieldset>
    <label>Select your image</label>
    <img src="assets/add-new.png"/>
     <input name="form_fileupload" type="file" value="">  
    </fieldset> 
                
    <fieldset>                                                <label>Projects title</label>
    <input name="form_projectTitle" value="" placeholder="Project Title here">
        </input>   
    </fieldset>    
    <fieldset> 
    <label>Project Description</label>          
    <textarea name="form_projectDescription" placeholder="Project Description" form="new-project-form"></textarea>
    </fieldset> 
    <input  type="submit"/> 
    <a href="admin.php"><button>Finished Editing</button></a>
    </form>
    
     <?php else: ?> 
      
       <?= header( "location:./index.php"); ?>
      
        
   <?php endif; ?> 
      
       </div>
</div>


<?php
include("./includes/footer.php");

?>