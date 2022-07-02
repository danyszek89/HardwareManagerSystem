<?php 
    session_start();
    $_SESSION['remember_firstName'] = $_POST['firstName'];
    $_SESSION['remember_lastName'] = $_POST['lastName'];
    //$_SESSION['remember_computerSelect'] = $_POST['computerSelect'];
    $_SESSION['remember_activated'] = $_POST['activated'];
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

            $sqlik = "SELECT * FROM employees WHERE name='$firstName' AND surname='$lastName'";
            $wynikik = mysqli_query($link, $sqlik);    

            if($rekordik=mysqli_fetch_assoc($wynikik))
            {
                //Taki user istnieje
                $_SESSION['error_userExists']="Ten użytkownik już istnieje";      
                header('Location: adduser.php?error_userExists');          
            }  
            else {
                //Employee insert
                $sql = "INSERT INTO employees (`id`, `name`, `surname`, `registered`, `active`) VALUES (NULL, '$firstName', '$lastName', '$date', '$check_value')";
                $wynik = mysqli_query($link, $sql);  
                $last_id = mysqli_insert_id($link);
                echo "Last ID: ".$last_id;

                //Computer update in employees table
                $sql_2 = "UPDATE computers SET owner_id='$last_id' WHERE id = '$computerSelect'";
                $wynik_2 = mysqli_query($link, $sql_2);  

                $_SESSION['user_was_added']="Użytkownik został dodany";           
                header("Location:employees.php");
            }    

            
        }      
        else
        {
            $sqlik = "SELECT * FROM employees WHERE name='$firstName' AND surname='$lastName'";
            $wynikik = mysqli_query($link, $sqlik);    

            if($rekordik=mysqli_fetch_assoc($wynikik))
            {
                //Taki user istnieje
                $_SESSION['error_userExists']="Ten użytkownik już istnieje";      
                header('Location: adduser.php?error_userExists');          
            }    
            else{
                //Adding new user without computer
                $sql = "INSERT INTO employees (`id`, `name`, `surname`, `registered`, `active`) VALUES (NULL, '$firstName', '$lastName', '$date', '$check_value')";
                $wynik = mysqli_query($link, $sql);  

                $_SESSION['user_was_added']="Użytkownik został dodany";    
                unset($_SESSION['remember_firstName']);
                unset($_SESSION['remember_lastName']);
                unset($_SESSION['remember_activated']);       
                header("Location:employees.php");
            }    
        }
    }                
?>