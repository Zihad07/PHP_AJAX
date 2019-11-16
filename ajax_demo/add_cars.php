<?php 
    require "db.php";
    require "function.php";

    if(isset($_POST['car_name'])){
        $car = trim($_POST['car_name'])??'';

        if($car !== ''){
            // insert car in database

            $query = "INSERT INTO cars(car) VALUES('{$car}') ";
            $car_insert_query = mysqli_query($connection,$query);
            // query error checking
            confirmQuery($car_insert_query);

            // echo "car added";
            // header("Location: index.html");
            
        }
    }


?>