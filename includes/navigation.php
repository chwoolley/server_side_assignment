<?php if ( isset($_SESSION["verified"]) ):?>
<nav>
<ul>

    <li><a href="index.php">Work</a></li>

    <li><a href="about.php">About</a></li>

<li><a href="admin.php">Admin</a></li>
<li><a href="logout.php">Logout</a></li>    

</ul>
</nav>

<?php else: ?>




<nav>
<ul>

    <li><a href="index.php">Work</a></li>

    <li><a href="about.php">About</a></li>

<li><a href="contact.php">Contact</a></li>
   

</ul>
</nav>
 <?php endif; ?>