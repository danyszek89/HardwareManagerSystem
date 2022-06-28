<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Komputery</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Komputery</h1>
                    <p class="mb-4">Lisa wszystkich komputerów.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dostępne komputery</h6>
                            <?php
                                if (isset($_SESSION['type']) && ($_SESSION['type'] == 'administrator' || $_SESSION['type'] == 'moderator'))
                                {
                                    echo "<a class='mt-2 btn btn-success btn-sm' href='addcomputer.php'>Dodaj komputer</a>";
                                }
                                else
                                {
                                    echo "<a class='mt-2 btn btn-success btn-sm  disabled' href='#'>Dodaj komputer</a>";
                                }
                            ?>
                           
                            
                        </div>
                     
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>                                           
                                            <th>Nazwa komputera</th>                                           
                                            <th>Użytkownik</th>                                           
                                            <th>Numer seryjny</th>
                                            <th>Marka</th>
                                            <th>Model</th>
                                            <th>Akcje</th>                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php              
                                            include('connection.php');                               
                                            //$sql = "SELECT computers.id, computers.computer_name, employees.name, computers.serial_number, computers.brand, computers.model
                                            //FROM computers INNER JOIN employees ON employees.id = computers.owner_id";
                                            $sql = "SELECT * FROM computers";
                                            $wynik = mysqli_query($link, $sql);     
                                            while($rekord=mysqli_fetch_assoc($wynik))
                                            {
                                                echo "
                                                    <tr>
                                                        <td>".$rekord['id']."</td>
                                                        <td>".$rekord['computer_name']."</td>                         
                                                        <td>".$rekord['owner_id']."</td>                         
                                                        <td>".$rekord['serial_number']."</td>
                                                        <td>".$rekord['brand']."</td>
                                                        <td>".$rekord['model']."</td>                          
                                                    ";   
                                                        if (isset($_SESSION['type']) && ($_SESSION['type'] == 'administrator' || $_SESSION['type'] == 'moderator'))
                                                        {
                                                            echo "
                                                            <td>
                                                            <button type='button' class='btn btn-primary btn-sm editbtn'> Edytuj </button>
                                                            <button type='button' class='btn btn-danger btn-sm deletebtn'> Usuń </button>   
                                                            </td>";
                                                        }
                                                        else{
                                                            echo "
                                                            <td>
                                                            <button type='button' class='disabled btn btn-primary btn-sm '> Edytuj </button>
                                                            <button type='button' class='disabled btn btn-danger btn-sm '> Usuń </button>   
                                                            </td>";
                                                        }
                                                            
                                                echo "</tr>
                                                ";                                             
                                            }                                   
                                        ?>                                   
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edycja danych komputera </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- POPUP EDYCJI DANYCH KOMPUTERA -->
                <form action="updatecomputer.inc.php" method="POST">

                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Nazwa komputera </label>
                            <input type="text" name="editName" id="editName" class="form-control"
                                placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label> Uzytkownik </label>                          
                            <select name="editUser" id="editUser" class='form-select' aria-label='Default select example'>
                                <option>Brak</option>                                                         
                                    <?php              
                                        include('connection.php');     
                                        $sql = "SELECT * FROM employees";
                                        $wynik = mysqli_query($link, $sql);     
                                        while($rekord=mysqli_fetch_assoc($wynik))
                                        {
                                            echo "                                                                
                                                    <option>".$rekord['id']."</option>                                                                             
                                                ";
                                        }                                   
                                    ?>                                   
                            </select>                       
                        </div>
                        
                        <div class="form-group">
                            <label> Numer seryjny </label>
                            <input type="text" name="editSerialNumber" id="editSerialNumber" class="form-control"
                                placeholder="" required>
                        </div>
                        
                        <div class="form-group">
                            <label> Marka</label>
                            <input type="text" name="editBrand" id="editBrand" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label> Model</label>
                            <input type="text" name="editModel" id="editModel" class="form-control" placeholder="">
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Aktualizuj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Usuwanie komputera </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecomputer.inc.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h5> Czy na pewno chcesz wybrane urządzenie?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Anuluj </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Usuń </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Dane urządzenia </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="view_id" id="view_id">                     
                        <h4 id="editName"> <?php echo ''; ?> </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Anuluj </button>                        
                    </div>
                </form>

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#editName').val(data[1]);
                $('#editUser').val(data[2]);
                $('#editSerialNumber').val(data[3]);
                $('#editBrand').val(data[4]);
                $('#editModel').val(data[5]);
                
            });
        });
    </script>
</body>
</html>