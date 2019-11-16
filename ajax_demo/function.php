<?php 
require "db.php";

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("Query Filed ".mysqli_error($connection));
    }
}




?>