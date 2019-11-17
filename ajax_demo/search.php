<?php 
require "db.php";
require "function.php";
// db connection

    

    // if($connection){
    //     echo "Connected";
    // }

    // if(isset($_POST)){
    //     echo $_POST['search'];
    // }

    $search = mysqli_real_escape_string($connection,$_POST['search'])??'';

    if($search !== ""){
        $query = "SELECT * FROM cars WHERE car LIKE '{$search}%' ";
        $search_query = mysqli_query($connection,$query);

        $count = mysqli_num_rows($search_query);
        if($count == 0){
            echo "Sorry we don't have that car available";
        }

       
        while ($row = mysqli_fetch_assoc($search_query)) {
            $brand = $row['car'];
            ?>
            <ul class="list-unstyled">
                <?php 
                    echo "<li>{$brand}</li>";
                ?>
            </ul>
    
        <?php } 
    }?>
    



