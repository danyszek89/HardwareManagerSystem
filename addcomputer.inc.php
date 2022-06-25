<?php 
 session_start();
 include('connection.php');  
 if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $serialNumber = $_POST['serialNumber'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
                
    if(strlen($name)<2)
    {     
        $_SESSION['error_name']="Nazwa musi składać się z co najmniej 2 znaków";      
        header('Location: addcomputer.php?error_name');
           
    }  
    else if(strlen($serialNumber)<2)
    {
        $_SESSION['error_serialNumber']="Numer seryjny musi składać się z co najmniej 2 znaków";
        header('Location: addcomputer.php?error_serialNumber');              
    }   
    else if(strlen($brand)<2)
    {
        $_SESSION['error_brand']="Marka musi składać się z co najmniej 2 znaków";
        header('Location: addcomputer.php?error_serialNumber');              
    }       
    else
    {
        $sql = "INSERT INTO computers (`id`, `name`, `serial_number`, `brand`, `model`) VALUES (NULL, '$name', '$serialNumber', '$brand', '$model')";
        $wynik = mysqli_query($link, $sql);  

        header("Location:computers.php");
    }      
    

}

                     
?>