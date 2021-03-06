<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dodaj komputer</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                        <h1 class="h3 mb-2 text-gray-800">Dodaj komputer</h1>                       

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">                            
                                <a class='mt-2 btn btn-warning btn-sm' href='computers.php'>Powrót</a>
                            </div>

                            <div class="card-body">
                                <form action='addcomputer.inc.php' method='POST'>
                                    <?php       

                                        
                                                                                                 
                                        //Errors handling                                      
                                        if(isset($_SESSION['error_name']))
                                        {                                            
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_name'].'</div>'; 
                                            unset($_SESSION['error_name']); 
                                        }
                                        if(isset($_SESSION['error_serialNumber']))
                                        {                                          
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_serialNumber'].'</div>'; 
                                            unset($_SESSION['error_serialNumber']); 
                                        }     
                                        if(isset($_SESSION['error_brand']))
                                        {                                          
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_brand'].'</div>'; 
                                            unset($_SESSION['error_brand']); 
                                        }    
                                        if(isset($_SESSION['error_model']))
                                        {                                          
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_model'].'</div>'; 
                                            unset($_SESSION['error_model']); 
                                        }    
                                        if(isset($_SESSION['error_nameExists']))
                                        {                                          
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_nameExists'].'</div>'; 
                                            unset($_SESSION['error_nameExists']); 
                                        }  
                                        if(isset($_SESSION['error_snExists']))
                                        {                                          
                                            echo' <div class="alert alert-danger" role="alert">'.$_SESSION['error_snExists'].'</div>'; 
                                            unset($_SESSION['error_snExists']); 
                                        }        

                                    ?>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nazwa komputera</label>
                                        
                                        <?php
                                            //Pozostawia wpisany login po nieudanej rejestracji
                                            if(!isset($_SESSION['remember_name']))
                                            {
                                                $_SESSION['remember_name']='';
                                            }
                                            echo '<input type="text" name="name" id="name" class="form-control" required autocomplete="off" value="'.$_SESSION['remember_name'].'">';                                     
                                            unset($_SESSION['remember_name']);
                                       ?>
                                        <!-- <input type="text" name="name" id="name" class="form-control" required>                                                                     -->
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Numer seryjny</label>
                                        <?php
                                            //Pozostawia wpisany login po nieudanej rejestracji
                                            if(!isset($_SESSION['remember_serialNumber']))
                                            {
                                                $_SESSION['remember_serialNumber']='';
                                            }
                                            echo '<input type="text" name="serialNumber" id="serialNumber" class="form-control" required autocomplete="off" value="'.$_SESSION['remember_serialNumber'].'">';                                     
                                            unset($_SESSION['remember_serialNumber']);
                                        ?>
                                        <!-- <input type="text" name="serialNumber" id="serialNumber" class="form-control" required> -->
                                    </div>
                                  
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Marka</label>
                                        <?php
                                            //Pozostawia wpisany login po nieudanej rejestracji
                                            if(!isset($_SESSION['remember_brand']))
                                            {
                                                $_SESSION['remember_brand']='';
                                            }
                                            echo '<input type="text" name="brand" id="brand" class="form-control" required autocomplete="off" value="'.$_SESSION['remember_brand'].'">';                                     
                                            unset($_SESSION['remember_brand']);
                                       ?>
                                        <!-- <input type="text" name="brand" id="brand" class="form-control" required> -->
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Model</label>
                                        <?php
                                            //Pozostawia wpisany login po nieudanej rejestracji
                                            if(!isset($_SESSION['remember_model']))
                                            {
                                                $_SESSION['remember_model']='';
                                            }
                                            echo '<input type="text" name="model" id="model" class="form-control" required autocomplete="off" value="'.$_SESSION['remember_model'].'">';                                     
                                            unset($_SESSION['remember_model']);
                                       ?>
                                        <!-- <input type="text" name="model" id="model" class="form-control"> -->
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