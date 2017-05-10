<?php

include("./includes/header.php");


if (isset($_GET["update_project_status"])){
$cms_DB->toggle_project_availability($_GET["update_project_status"]);}
?>

<style> 

</style>
<div class="admin-content">
   
<?php if ( isset($_SESSION["verified"]) ):?> 
    <h1>Admin</h1>
    <div class="project-description">
    <div class="new"> <a href ="new.php"><img class="add-new" src="assets/add-new.png" />
    </a> 
    </div>
    <div class="project-type-new">  
    <h5>ADD NEW PROJECT!!...</h5> 
    </div>      
    </div>
    
    <?php for($i=0; $i < count ($projects_Display) ; $i++) : ?>
             
    <div class="project-description">
    <img class="project-image" src='./assets/img/<?=$projects_Display[$i][4]?>'/>
    
    <div class="project-type">
     <h5><?=$projects_Display[$i][2]?></h5>
     <p><?=$projects_Display[$i][3]?></p>   
    </div>
    <div class="toggle">
     
    <h5>Edit / Status</h5> 
    
    <button><a href='edit-project.php?projectid=<?=$projects_Display[$i][0]?>'> Edit</a></button>
    
    <button id="<?= 'update-button-' . $projects_Display[$i][0] ?>" class="toggle-project" onclick="update_db_ajax(<?= $projects_Display[$i][0] ?>);">
    <?= ($projects_Display[$i][7] == "true") ? '<span class="availability-live">Live</span>' : '<span class="availability-not-live">Not live</span>' ?>
           
        
    </button>     
        
         
 
     
        
    </div>
                      
    </div>
  <?php endfor; ?>  
    
  <?php else: ?>  
  
    <?= header( "location:./login.php"); ?>
      
        
   <?php endif; ?>            
</div>

<?php
include("./includes/footer.php");

?>


<script>
function updateButtonView(n){
    var selector ="update-button-" + n;
    var buttonElement = document.getElementById(selector);
    var theSpan = buttonElement.querySelector('span');
    
    if (theSpan.classList.contains("availability-not-live")){
        theSpan.classList.remove("availability-not-live");
        theSpan.classList.add("availability-live");
        theSpan.innerHTML = "Live";
        } else {
            theSpan.classList.remove("availability-live");
            theSpan.classList.add("availability-not-live");
            theSpan.innerHTML = "Not Live";
            }

}
    
    

    function transferComplete(e) {
        if (e.target.status == 200 ){
            updateButtonView(e.target.responseText);
        }
        
        
    }
    
    function update_db_ajax(p){
        var oReq = new XMLHttpRequest();
        var params =  "?projectid=" + p; 
        console.log(params);
        oReq.addEventListener("load", transferComplete); 
        oReq.open("GET", "./classes/toggle_project_status.php" + params);
        oReq.send();
        
        
    }
    




</script>
