<?php
 session_start();
 include('connection.php');
 if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $editName = $_POST['editName'];
        $editSerialNumber = $_POST['editSerialNumber'];
        $editBrand = $_POST['editBrand'];
        $editModel = $_POST['editModel'];

        $query = "UPDATE computers SET name='$editName', serial_number='$editSerialNumber', brand='$editBrand', model='$editModel' WHERE id='$id'";
        $query_run = mysqli_query($link, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:computers.php?dataUpdated");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>