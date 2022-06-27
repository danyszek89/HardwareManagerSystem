<?php
 session_start();
 include('connection.php');
 if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $editName = $_POST['editName'];
        $editUser = $_POST['editUser'];
        $editSerialNumber = $_POST['editSerialNumber'];
        $editBrand = $_POST['editBrand'];
        $editModel = $_POST['editModel'];

        echo "Name: ".$editName ;echo  "<br>";
        echo "User: ".$editUser;echo  "<br>";
        echo "SN: ".$editSerialNumber;;echo  "<br>";
        echo "Brand: ".$editBrand;;echo  "<br>";
        echo "Model: ".$editModel;echo "<br>";

        // if(empty($editUser)){
        //     echo '<script> alert("Data Updated"); </script>';
        //     header("Location:computers.php?insertUser");
        // }

        if($editUser=="Brak" || empty($editUser))
        {
            echo "XD";

            $query = "UPDATE computers SET computer_name='$editName', owner_id=NULL, serial_number='$editSerialNumber', brand='$editBrand', model='$editModel' WHERE id='$id'";
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
        else{
            $query = "UPDATE computers SET computer_name='$editName', owner_id='$editUser', serial_number='$editSerialNumber', brand='$editBrand', model='$editModel' WHERE id='$id'";
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


        

    }
?>