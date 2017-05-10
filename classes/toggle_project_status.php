<?php

include_once("db_manager.php");

$cms_db = new DB_Connect();
$res = $cms_db->toggle_project_availability($_GET["projectid"]);


if ($res > 0) {
    echo $_GET["projectid"];
    
} else {
    echo -1;
    
}






?>
