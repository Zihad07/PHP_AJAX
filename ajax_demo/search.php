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

    $search = $_POST['search']??'';

    if($search !== ""){
        $query = "SELECT * FROM cars WHERE car LIKE '{$search}%' ";
        $search_query = mysqli_query($connection,$query);

       
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
    



