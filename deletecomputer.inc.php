<?php
    session_start();
    include('connection.php');

    if(isset($_POST['deletedata']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM computers WHERE id='$id'";
        $query_run = mysqli_query($link, $query);

        if($query_run)
        {
            
            $_SESSION['computer_was_deleted']="Komputer został usunięty";
            header("Location:computers.php");
        }
        else
        {
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }   
?>