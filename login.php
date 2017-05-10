<?php

include("./includes/header.php");

?>





<div class="admin-content">
   
   
        <?php if ( isset($_GET["registered"])):?>
<div><h5>thank you for registering, please log in</h5></div>
      <?php endif; ?>
           <?php if ( isset($_GET["loggedout"])):?>
<div><h5>You have logged out, log in again or <a href="index.php">Continue browsing.</a></h5></div>
      <?php endif; ?>
   
    <h1>Admin:login</h1>
<?php if ( isset($_SESSION["verified"]) ):?>
<?= header( "location:./admin.php"); ?>
<?php else: ?>
             
             
         <form action="<?= "./classes/processlogin.php" ?>" method="post">
           
           <label></label>
           <input type="text" value="" name="username_from_form" maxlength="50" placeholder="Username"/>
           
           <label></label>
           <input type ="password" value="" name="password_from_form" maxlength="100" placeholder="Password"/>
           
           <input type="submit" name="submit-login" value="login"/>
       </fieldset> 
        
        
        
    </form>
    <?php endif; ?>

</div>

<?php
include("./includes/footer.php");
?>