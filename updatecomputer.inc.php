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

        else
        {
            //Podzial na imie i nazwisko          
            $podzial = explode(" ", $editUser);
            echo 'Imie: '.$podzial[0].'<br>'; 
            echo 'Nazwisko: '.$podzial[1].'<br>'; 
                    
            //Getting 'id' of user (required for foreign key)
            $query0 = "SELECT * FROM employees WHERE name='".$podzial[0]."' AND surname='".$podzial[1]."'";
            $wynik0 = mysqli_query($link, $query0);  

            if($rekord=mysqli_fetch_assoc($wynik0))
            {              
                //Swap to 'id' by name and surname
                $editUser=$rekord['id'];
                echo "Wybrany user: ".$editUser; //id value
            }

            $query = "UPDATE computers SET computer_name='$editName', owner_id='$editUser', serial_number='$editSerialNumber', brand='$editBrand', model='$editModel' WHERE id='$id'";
            $query_run = mysqli_query($link, $query);

            if($query_run)
            {              
                $_SESSION['dataUpdated']="Dane zostały zaktualizowane";
                header("Location:computers.php?dataUpdated");
            }
            else
            {
                echo '<script> alert("Data Not Updated"); </script>';
            }
        }
    }
?>