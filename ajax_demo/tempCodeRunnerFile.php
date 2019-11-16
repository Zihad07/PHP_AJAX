<?php
require "db.php";
require "function.php";

$query = "SELECT * FROM cars ";
$query_car_info = mysqli_query($connection,$query);

echo mysqli_fetch_all($query_car_info);