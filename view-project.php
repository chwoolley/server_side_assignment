<?php
ob_start();
include("./includes/header.php");

?>
<?php
$project_array = [];
if (isset($_GET["projectid"])){
    
    $project_array = $cms_DB->display_single_project($_GET["projectid"]);
    
}

?>


 
<?php if ( isset($_SESSION["verified"]) ):?>
<div class="view-work">

<?php if (count($project_array)): ?>
<h1><?=$project_array[0]['title']?></h1>
<p><?=$project_array[0]['description']?> </p>
<img src="./assets/img/<?= $project_array[0]['image_path']; ?>"/>
    <button><a href='edit-project.php?projectid=<?= $project_array[0]['project_id']; ?>'> Edit</a>  </button> 

<?php else: ?><?php
    header( "Location: index.php" );
    exit;
    ?>
<?php endif; ?>

</div>
<?php else: ?> 
<div class="view-work">

<?php if (count($project_array)): ?>
<h1><?=$project_array[0]['title']?></h1>
<p><?=$project_array[0]['description']?> </p>
<img src="./assets/img/<?= $project_array[0]['image_path']; ?>"/>
  

<?php else: ?><?php
    header( "Location: index.php" );
    exit;
    ?>
<?php endif; ?>

</div>
  <?php endif; ?> 

<?php
include("./includes/footer.php");

?>