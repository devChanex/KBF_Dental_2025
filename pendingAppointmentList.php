<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> KBF Dental Care </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include_once('bars/sidebar.php'); ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include_once('bars/topbar.php'); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid" id="content-table">

                    <!-- Page Heading -->
                    <div class="card shadow mb-12">
                        <div class="card-header py-3 <?php echo $cards; ?>">
                            <h6 class="m-0 font-weight-bold">Pending Appointment List</h6>
                        </div>
                        <div class="card-body">
                            <!-- USE THIS SPACE FOR YOUR ADDITIONAL CODE SNIPPET -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Client id</th>
                                                <th>Date Booked</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Client id</th>
                                                <th>Date Booked</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="resultResponsez">



                                        </tbody>
                                    </table>
                                </div>
                            </div>



                            <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-xl " role="document">
                                    <div class="modal-content ">
                                        <form id="editForm">
                                            <div class="modal-header <?php echo $cards; ?>">
                                                <h5 class="modal-title" id="editModalLabel">Approve Appointment</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="clientid" id="book-clientid" readonly>

                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="book-fullname" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" name="email" id="book-email"
                                                        readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" class="form-control" name="date" id="book-date">
                                                </div>

                                                <div class="form-group">
                                                    <label>Time</label>
                                                    <input type="time" class="form-control" name="time" id="book-time">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="approve()">Approve</button>

                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <!-- END OF YOUR ADDITIONAL CODE SNIPPET -->
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once('bars/footer.php'); ?>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
            <script src="js/custom.js"></script>
            <script src="controllers/logOutConroller.js"></script>
            <script src="controllers/sessionController.js"></script>
            <script src="controllers/getPendingAppointmentList-v4.js"></script>
            <script src="controllers/mailerController.js"></script>




</body>

</html>