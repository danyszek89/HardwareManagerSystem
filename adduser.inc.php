<?php 

if(isset($_POST['submit'])) {

    include('connection.php');     

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $date = date('Y-m-d');
    $check_value = isset($_POST['activated']) ? 1 : 0;
        
        // $computer = $_POST['computerSelect'];
            
        // $sql1 = "SELECT id FROM computers WHERE name='$computer';";
        // $wynik1 = mysqli_query($link, $sql1);     
        // if($rekord1=mysqli_fetch_assoc($wynik1))
        // {
            
        //     $computer=$rekord1['id'];
        // }      
         
        
    

    $sql = "INSERT INTO employees (`id`, `name`, `surname`, `registered`, `active`) VALUES (NULL, '$firstName', '$lastName', '$date', '$check_value')";
    $wynik = mysqli_query($link, $sql);  

    header("Location:employees.php");

}

                     
?>