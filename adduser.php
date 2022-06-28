<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dodaj użytkownika</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once('sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include_once('topbar.php');?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Dodaj użytkownika</h1>
                        <!-- <p class="mb-4">Lisa wszystkich użytkowników.</p> -->

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">                               
                                <a class='mt-2 btn btn-warning btn-sm' href='employees.php'>Powrót</a>
                            </div>

                            <div class="card-body">
                                <form action='adduser.inc.php' method='POST'>
                                    <?php                                                                 
                                        //Errors handling
                                        if(isset($_SESSION['error_firstName']))
                                        {                                            
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_firstName'].'</div>'; 
                                            unset($_SESSION['error_firstName']); 
                                        }
                                        if(isset($_SESSION['error_lastName']))
                                        {                                          
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_lastName'].'</div>'; 
                                            unset($_SESSION['error_lastName']); 
                                        }                                                          
                                    ?>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Imię</label>
                                        <input type="text" name="firstName" id="name" class="form-control" required>                                                                
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Nazwisko</label>
                                        <input type="text" name="lastName" id="surname" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                    <label> Komputer </label>     
                                        <select class='form-select' name="computerSelect" id="computerSelect"  aria-label='Default select example'>
                                            <option>Wybierz komputer z listy</option>
                                                <?php              
                                                    include('connection.php');     
                                                    $sql = "SELECT * FROM computers WHERE owner_id IS NULL";
                                                    $wynik = mysqli_query($link, $sql);     
                                                    while($rekord=mysqli_fetch_assoc($wynik))
                                                    {
                                                        echo "                                                                                        
                                                                <option>".$rekord['computer_name']."</option>                    
                                                            ";
                                                    }                                   
                                                ?>                                           
                                        </select>                                     
                                    </div>
                                                    
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="activated" id="activated" class="form-check-input">
                                            <label class="form-check-label" for="exampleCheck1">Czy aktywować konto?</label>                                                                   
                                    </div>                                   
                                    <button type="submit" name="submit" class="btn btn-primary">Dodaj</button>
                                </form>     
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once('footer.php');?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Wylogowanie</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Czy na pewno chcesz się wylogować?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Anuluj</button>
                    <a class="btn btn-primary" href="index.php">Wyloguj</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>