<?php 

// db connection

    $connection = mysqli_connect("localhost","root","","ajax");

    // if($connection){
    //     echo "Connected";
    // }

    // if(isset($_POST)){
    //     echo $_POST['search'];
    // }

    $search = $_POST['search']??'';

    if($search !== ""){
        $query = "SELECT * FROM cars WHERE car LIKE '{$search}%' ";
        $search_query = mysqli_query($connection,$query);

        if(!$search_query){
            die("Query Filed ".mysqli_error($connection));
        }

        echo "ok";
    }



?>