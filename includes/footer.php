<footer>
<?php if ( isset($_SESSION["verified"]) ):?>
<nav class="footer-nav">
<ul>

    <li><a href="index.php">Work</a></li>
       <li>/</li>
    <li><a href="about.php">About</a></li>
   <li>/</li>
<li><a href="admin.php">Admin</a></li>
   <li>/</li>
<li><a href="logout.php">Logout ::.</a></li>    

</ul>
</nav>    

<?php else: ?>   

<nav class="footer-nav"> 
 <ul>

    <li><a href="index.php">Work</a></li>
    <li>/</li>
    <li><a href="about.php">About</a></li>
    <li>/</li>
<li><a href="contact.php">Contact</a></li>
    <li>/</li>
<li><a href="login.php">Login ::.</a></li>
   

</ul>
</nav>
 <?php endif; ?>   
</footer>
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
 <script src="js/jquery.isotope.js" type="text/javascript"></script> 
<script>
$(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        },

    });
 
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});



</script>
</body>
</html>
    