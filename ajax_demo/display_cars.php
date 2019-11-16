<?php 
    require "db.php";
    require "function.php";

    $query = "SELECT * FROM cars ORDER BY id DESC LIMIT 7 ";
    $query_car_info = mysqli_query($connection,$query);
    confirmQuery($query_car_info);


    // print_r(json_encode(mysqli_fetch_all($query_car_info)));

    while ($row = mysqli_fetch_assoc($query_car_info)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['car']}</td>";
        echo "</tr>";
    }




?>