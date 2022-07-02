<?php
    session_start();
    include('connection.php');

    if(isset($_POST['deletedata']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM employees WHERE id='$id'";
        $query_run = mysqli_query($link, $query);

        if($query_run)
        {
            $_SESSION['user_was_deleted']="Użytkownik został usunięty";
            header("Location:employees.php");
        }
        else
        {
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }
?>