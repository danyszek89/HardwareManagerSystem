<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HMS-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 
            include_once('sidebar.php');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php 
                include_once('topbar.php');
            ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Podsumowanie</h1>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="mainCard" href="computers.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body MainCard">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Komputery</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">42</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-desktop fa-2x text-gray-300"></i>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="mainCard" href="employees.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Użytkownicy</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">22</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="mainCard" href="#">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Urządzenia peryferyjne
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tablet fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a class="mainCard" href="#">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Inne</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                

                    <!-- Content Row -->
                    <div class="row">

                      

                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php 
            include_once('footer.php');
             ?>

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