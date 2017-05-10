<?php


include("./classes/db_manager.php");
include("./classes/password_manager.php");
include("./classes/session_manager.php");

$cms_DB = new DB_connect();
$groups_Menu = $cms_DB->get_all_Project_Groups();
$projects_Display = $cms_DB->display_all_Projects();
$projects_by_status = $cms_DB->display_all_byStatus();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="js/jquery.isotope.js" type="text/javascript"></script>
   <link rel="stylesheet" href="css/style.css">    
    
</head>
<body>
   
<?php  
include("./includes/content-nav-test.php");    
 ?>
 <div class="content">
 <div class="test"> 
 <div class="gallery">    
  <?php for($i =0; $i < count ($projects_by_status) ; $i++) : ?>
    
    <div class="<?=$projects_by_status[$i][1]?> ">
        
        <a href='view-project.php?projectid=<?=$projects_by_status[$i][0]?>'><img class="" src='./assets/img/<?=$projects_by_status[$i][4]?>'/></a>
        <span class=""><!--to be replaced by title of project --></span>
    </div>
<?php endfor; ?>

</div> 
</div>              
</div>
 <script>

</script>   
</body>
</html>