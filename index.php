<?php
include("./includes/header.php");

?>

 <?php  
include("./includes/content-nav.php");    
 ?>   
<div class="content">
<div class="content-home">
<div class="portfolioContainer gallery-wrap">
    <!--content goes here -->
    
    <?php for($i =0; $i < count ($projects_by_status) ; $i++) : ?>
    
    <div class="gallery <?=$projects_by_status[$i][8]?>">
        
        <a href='view-project.php?projectid=<?=$projects_by_status[$i][0]?>'><img class="" src='./assets/img/<?=$projects_by_status[$i][4]?>'/></a>
        <span class=""><!--to be replaced by title of project --></span>
    </div>
<?php endfor; ?>

</div>
</div>
</div>
<?php
include("./includes/footer.php");

?>