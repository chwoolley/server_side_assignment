<?php
include("./includes/header.php");

?>

 

<div class="view-work">
<h1>Get in Touch!</h1>

<div class="form-container">

<form class="email-form" id="contact_form" method="post" action="./classes/contact_process.php">
<fieldset>  
 <input class="contact-form"  name="name" id="name" placeholder="Name" > 
   <input class="contact-form"   name="email" id="email" placeholder="E-mail" >
   <input class="contact-form"  name="phone" id="phone" placeholder="Phone number"> 
   </fieldset> 
   <fieldset>
   <textarea  class="contact-form" name="message" id="message" placeholder="Message" cols="30" rows="10"></textarea> <button>Submit</button><button>Reset</button>
   </fieldset>
     <p class="success">Your message has been sent successfully.</p> <p class="error">E-mail must be valid and message must be longer than 20 characters.</p></form>
    </div>


</div>



</div>



<?php
include("./includes/footer.php");

?>
