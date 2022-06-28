<?php 
    session_start();
    include('connection.php');  
    if(isset($_POST['submit'])) 
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $date = date('Y-m-d');
        $check_value = isset($_POST['activated']) ? 1 : 0;
        $computerSelect = $_POST['computerSelect'];
                    
        if(strlen($firstName)<2)
        {     
            $_SESSION['error_firstName']="Imię musi składać się z co najmniej 2 znaków";      
            header('Location: adduser.php?error_firstName');
            
        }  
        else if(strlen($lastName)<2)
        {
            $_SESSION['error_lastName']="Nazwisko musi składać się z co najmniej 2 znaków";
            header('Location: adduser.php?error_lastName');              
        }     
        else if(isset($_POST['computerSelect'])) 
        {
            //Selected computer for new employee
            //Getting 'computer_id' to get 'computer_name' (required for foreign key)
            $sql0 = "SELECT id FROM computers WHERE computer_name='$computerSelect'";
            $wynik0 = mysqli_query($link, $sql0);  

            if($rekord=mysqli_fetch_assoc($wynik0))
            {
                //Swap 'computer_name' to 'id'(computer)
                $computerSelect=$rekord['id'];
                echo "Wybrany PC: ".$computerSelect;
            }

            //Employee insert
            $sql = "INSERT INTO employees (`id`, `name`, `surname`, `registered`, `active`) VALUES (NULL, '$firstName', '$lastName', '$date', '$check_value')";
            $wynik = mysqli_query($link, $sql);  
            $last_id = mysqli_insert_id($link);
            echo "Last ID: ".$last_id;

            //Computer update in employees table
            $sql_2 = "UPDATE computers SET owner_id='$last_id' WHERE id = '$computerSelect'";
            $wynik_2 = mysqli_query($link, $sql_2);  

            header("Location:employees.php");
        }      
        else
        {
            //Adding new user without computer
            $sql = "INSERT INTO employees (`id`, `name`, `surname`, `registered`, `active`) VALUES (NULL, '$firstName', '$lastName', '$date', '$check_value')";
            $wynik = mysqli_query($link, $sql);  

            header("Location:employees.php");
        }
    }                
?>