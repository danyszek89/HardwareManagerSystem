<?php
  session_start();
  $_SESSION['remember_login'] = $_POST['login'];
  include('connection.php');
  
  if (isset($_POST['loginSubmit']))
  {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($link, $query);
    
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
  
    if($rowcount == 1)
    {                 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password']))  
        {    
            if ($row['active'])
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['registered'] = $row['registered'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['active'] = $row['active'];         
                
                unset($_SESSION['remember_login']);
                header('Location: dashboard.php');
            }
            else
            {              
                header('Location: index.php?error_account_inactive');               
                $_SESSION['error_account_inactive'] = "Konto użytkownika zostało zablokowane.";
            }
        }
        else
        {
            //Login w bazie, ale złe hasło
            header('Location: index.php?error_bad_password');         
            $_SESSION['error_bad_password'] =  "Błędne hasło.";
        }             
    }   
    else
    {      
        header('Location: index.php?error_wrong_user');
        $_SESSION['error_wrong_user'] = "Brak użytkownika w bazie.";
    }
}  
?>