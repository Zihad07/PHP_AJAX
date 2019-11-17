<?php 
    require "db.php";
    include "function.php";

    // Updating Data

    if(isset($_POST['updatethis'])){
       $id = mysqli_real_escape_string($connection,$_POST['id']);
       $title = mysqli_real_escape_string($connection,$_POST['title']);
      


       $query = "UPDATE cars SET car= '$title' WHERE id=$id ";

       $result_set = mysqli_query($connection,$query);
       confirmQuery($result_set);


    }elseif(isset($_POST['deletethis'])){
        echo "id";
        // Delete data form DataBase
        $id = mysqli_real_escape_string($connection,$_POST['id']);

        $query = "DELETE FROM cars WHERE id = $id LIMIT 1 ";

        $result_delete = mysqli_query($connection,$query);
        confirmQuery($result_delete);
    }
    // Display action Box-Data
    elseif(isset($_POST['id'])){
        $id = mysqli_real_escape_string($connection,$_POST['id']);
        $query = "SELECT * FROM cars WHERE id={$id} ";
        $query_car_info = mysqli_query($connection,$query);
        confirmQuery($query_car_info);
    
    
        // print_r(json_encode(mysqli_fetch_all($query_car_info)));
    
        while ($row = mysqli_fetch_assoc($query_car_info)) {
            // echo "<tr>";
            // echo "<td>{$row['id']}</td>";
            // echo "<td><a data-rel='{$row['id']}' class='title-link' href='javascript:void(0)'>{$row['car']}</a></td>";
            // echo "</tr>";

            echo "<input data-rel='".$row['id']."' type='text' class='form-control title-input mb-2' value='".$row['car']."'>";
            echo "<input type='button' class='btn btn-success update' value ='Upadate'>";
            echo "<input type='button' class='btn btn-danger delete ml-2' value='Delete'>";
            echo "<input type='button' class='btn btn-dark btn-close ml-2' value='Close'>";
        }
    }

    


?>

<script>
    $(document).ready(function () {

        var id = $(".title-input").data('rel');
        var car_name = $(".title-input").val();
        var updatethis = "update";
        var deletethis = "delete";
        // Extract id and title
        $(".title-input").on('input', function () {
            id = $(this).data('rel');
            car_name = $(this).val();
            // alert([id,car_name]);
        })

// Close the all input option
        $(".btn-close").click(function(){
            $("#action-container").hide();
        })

        // Update Button Function
        $(".delete").on('click', function () {

           if(confirm("Ary you want to delete ...???")){
                $.post("process.php",{id:id,deletethis:deletethis},function(data){
                    // alert(data);
                    $("#action-container").hide();
                });
           }
          
        })

        $(".update").on('click', function () {


            $.post("process.php", {
                id: id,
                title: car_name,
                updatethis: updatethis
            }, function (data) {

                $("#feedback").text("Record updated successfully");
                setTimeout(function () {
                    $("#feedback").text("");
                }, 1400);



            })


            // Delete Oparation








        });


    });

</script>