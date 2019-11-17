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
        echo "<td><a data-rel='{$row['id']}' class='title-link' href='javascript:void(0)'>{$row['car']}</a></td>";
        echo "</tr>";
    }




?>

<script>
     $(".title-link").on("click", function () {
        //  alert("working :) ");
        $("#action-container").show();
        var id = $(this).data('rel')

        $.post("process.php",{id:id},function(data){
            $("#action-container").html(data);
        })


     });

</script>