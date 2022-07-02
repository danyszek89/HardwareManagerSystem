<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Użytkownicy</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Użytkownicy</h1>
                    <p class="mb-4">Lisa wszystkich użytkowników.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dostępni użytkownicy</h6>
                            <?php
                                if (isset($_SESSION['type']) && ($_SESSION['type'] == 'administrator'))
                                {
                                    echo "<a class='mt-2 btn btn-success btn-sm' href='adduser.php'>Dodaj użytkownika</a>";
                                }
                                else
                                {
                                    echo "<a class='mt-2 btn btn-success btn-sm disabled' href='#'>Dodaj użytkownika</a>";
                                }
                            ?>
                            
                        </div>
                        <div class="card-body">
                            <?php                                                                 
                                //Success message
                                if(isset($_SESSION['user_was_added']))
                                {                                            
                                    echo' <div class="alert alert-success" role="alert">'.$_SESSION['user_was_added'].'</div>'; 
                                    unset($_SESSION['user_was_added']); 
                                }     
                                //Success message
                               if(isset($_SESSION['user_was_deleted']))
                               {                                            
                                   echo' <div class="alert alert-success" role="alert">'.$_SESSION['user_was_deleted'].'</div>'; 
                                   unset($_SESSION['user_was_deleted']); 
                               }                                                                             
                            ?>
                       
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imie</th>
                                            <th>Nazwisko</th>                                          
                                            <th>Zarejestrowany</th>
                                            <th>Aktywny</th>
                                            <th>Akcje</th>
                                        </tr>
                                    </thead>                                  
                                    <tbody>
                                        <?php              
                                            include('connection.php');     
                                            //$sql = "SELECT employees.id, employees.name, employees.surname, computers.computer_name, employees.registered, employees.active
                                            //FROM employees INNER JOIN computers ON computers.owner_id = employees.id";
                                            $sql = "SELECT * FROM employees";
                                            $wynik = mysqli_query($link, $sql);     
                                            while($rekord=mysqli_fetch_assoc($wynik))
                                            {
                                                echo "
                                                    <tr>
                                                        <td>".$rekord['id']."</td>
                                                        <td>".$rekord['name']."</td>
                                                        <td>".$rekord['surname']."</td>                                                        
                                                        <td>".$rekord['registered']."</td>
                                                        <td>".$rekord['active']."</td>     
                                                    ";                                                   
                                                        if (isset($_SESSION['type']) && ($_SESSION['type'] == 'administrator'))
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
  <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <h5 class="modal-title" id="exampleModalLabel"> Edycja danych użytkownika </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- POPUP EDYCJI DANYCH USERA -->
                <form action="updateuser.inc.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Imię </label>
                            <input type="text" name="editName" id="editName" class="form-control"
                                placeholder="Wprowadź imię" required>
                        </div>

                        <div class="form-group">
                            <label> Nazwisko </label>
                            <input type="text" name="editSurname" id="editSurname" class="form-control"
                                placeholder="Wprowadź nazwisko" required>
                        </div>

                        <div class="form-group">
                            <label> Aktywny</label>
                            <input type="text" name="editActive" id="editActive" class="form-control"
                                 required>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Usuwanie użytkownika </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deleteuser.inc.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h5> Czy na pewno chcesz usunąć wybranego użytkownika?</h5>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Dane użytkownika </h5>
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
                $('#editSurname').val(data[2]);
                $('#editActive').val(data[4]);
                
            });
        });
    </script>  
</body>
</html>