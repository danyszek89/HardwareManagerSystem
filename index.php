<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Logowanie</title>
  </head>
<body>
   <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <div class="mb-md-5 mt-md-4 pb-5">
                        <img src="img/iconSmall.png" alt="">
                            <h2 class="fw-bold mb-2">Hardware manager system</h2>
                                <hr>
                            <p class="text-white-50 mb-5">Zarządzanie zasobami staje się łatwiejsze!</p>
                                <br>
                                               
                        <form action="login.php" method="POST">
                            <?php
                                session_start();                   
                                //Errors handling
                                if(isset($_SESSION['error_account_inactive']))
                                {
                                    //echo '<div class="error-handling">'.$_SESSION['error_account_inactive'].'</div>';
                                    echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_account_inactive'].'</div>'; 
                                    unset($_SESSION['error_account_inactive']); 
                                }
                                if(isset($_SESSION['error_bad_password']))
                                {
                                    //echo '<div class="error-handling">'.$_SESSION['error_bad_password'].'</div>';
                                    echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_bad_password'].'</div>'; 
                                    unset($_SESSION['error_bad_password']); 
                                }
                                if(isset($_SESSION['error_wrong_user']))
                                {
                                   //echo '<div class="error-handling">'.$_SESSION['error_wrong_user'].'</div>';
                                   echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_wrong_user'].'</div>';                                                     
                                   unset($_SESSION['error_wrong_user']); 
                                }                                       
                            ?>

                            <div class="form-outline form-white mb-4">
                                <input type="text" name="login" class="form-control form-control-lg" placeholder="Login" required/>                               
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Hasło" required/>                               
                            </div>
                    
                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Zapomniałeś hasła?</a></p>
                            <button class="btn loginButton btn-lg px-5" type="submit" name="loginSubmit">Zaloguj</button>  
                        </form>            
                    </div>
              
                    <div>
                        <p class="text-white-50 mb-0">Wersja 1.0</p>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
</section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>




