<?php 
 session_start();
 $_SESSION['remember_name'] = $_POST['name'];
 $_SESSION['remember_serialNumber'] = $_POST['serialNumber'];
 $_SESSION['remember_brand'] = $_POST['brand'];
 $_SESSION['remember_model'] = $_POST['model'];
 include('connection.php');  
 if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $serialNumber = $_POST['serialNumber'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
                
    if(strlen($name)<8)
    {     
        $_SESSION['error_name']="Nazwa komputera musi składać się z co najmniej 8 znaków";      
        header('Location: addcomputer.php?error_name');
           
    }  
    else if(strlen($serialNumber)<6)
    {
        $_SESSION['error_serialNumber']="Numer seryjny musi składać się z co najmniej 6 znaków";
        header('Location: addcomputer.php?error_serialNumber');              
    }   
    else if(strlen($brand)<2)
    {
        $_SESSION['error_brand']="Marka musi składać się z co najmniej 2 znaków";
        header('Location: addcomputer.php?error_serialBrand');              
    }  
    else if(strlen($model)<2)
    {
        $_SESSION['error_model']="Model musi składać się z co najmniej 2 znaków";
        header('Location: addcomputer.php?error_model');              
    }        
    else
    {
        $sqlik = "SELECT * FROM computers WHERE computer_name='$name'";
        $wynikik = mysqli_query($link, $sqlik);    

        if($rekordik=mysqli_fetch_assoc($wynikik))
        {
            //Komputer o taiej nazwie istnieje
            $_SESSION['error_nameExists']="Komputer o takiej nazwie już istnieje";      
            header('Location: addcomputer.php?error_nameExists');          
        }      

        $sqlik2 = "SELECT * FROM computers WHERE serial_number='$serialNumber'";
        $wynikik2 = mysqli_query($link, $sqlik2);     
            
        if($rekordik2=mysqli_fetch_assoc($wynikik2))
        {
            //Komputer o taim SN istnieje
            $_SESSION['error_snExists']="Komputer o takim SN już istnieje";      
            header('Location: addcomputer.php?error_snExists');
        }   

            $sql = "INSERT INTO computers (`id`, `computer_name`, `serial_number`, `brand`, `model`) VALUES (NULL, '$name', '$serialNumber', '$brand', '$model')";
            $wynik = mysqli_query($link, $sql);  

            $_SESSION['computer_was_added']="Komputer został dodany";
            unset($_SESSION['remember_name']);
            unset($_SESSION['remember_serialNumber']);
            unset($_SESSION['remember_brand']);
            unset($_SESSION['remember_model']);
            header("Location:computers.php");
        
    }      
}                  
?>