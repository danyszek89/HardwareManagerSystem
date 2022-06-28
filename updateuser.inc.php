<?php
    session_start();
    include('connection.php');
    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        $editName = $_POST['editName'];
        $editSurname = $_POST['editSurname'];
        $editActive = $_POST['editActive'];   

        $query = "UPDATE employees SET name='$editName', surname='$editSurname', active='$editActive' WHERE id='$id'";
        $query_run = mysqli_query($link, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:employees.php?dataUpdated");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>