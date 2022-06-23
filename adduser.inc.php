<?php 
 session_start();
 include('connection.php');  
 if(isset($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $date = date('Y-m-d');
    $check_value = isset($_POST['activated']) ? 1 : 0;
                
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
    else
    {
        $sql = "INSERT INTO employees (`id`, `name`, `surname`, `registered`, `active`) VALUES (NULL, '$firstName', '$lastName', '$date', '$check_value')";
        $wynik = mysqli_query($link, $sql);  

        header("Location:employees.php");
    }      
    

}

                     
?>