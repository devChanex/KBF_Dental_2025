<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KBF Dental Care</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

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

                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Page Heading -->
                            <div class="card shadow mb-12">
                                <div class="card-header py-3 <?php echo $cards; ?>">
                                    Electronic Statement of Account


                                    <button id="divPrinter" class="btn btn-secondary btn-sm btn-circle float-right"
                                        onclick="printDiv('bodyResult')" title="Print E-SOA"><i
                                            class="fas fa-print"></i></button>

                                    <a href="attachment.php?soaid=<?php echo $_GET["soaid"]; ?>"
                                        class="btn btn-primary btn-sm btn-circle float-right" title="View Attachment"><i
                                            class="fas fa-paperclip"></i></a>

                                    <button id="divPrinter" class="btn btn-warning btn-sm btn-circle float-right"
                                        onclick="signature()"><i class="fas fa-check"></i></button>
                                </div>
                                <input type="hidden" id="soaid" value="<?php echo $_GET["soaid"]; ?>">
                                <div class="card-body" id="bodyResult">
                                    <!-- USE THIS SPACE FOR YOUR ADDITIONAL CODE SNIPPET -->

                                    <!-- END OF YOUR ADDITIONAL CODE SNIPPET -->
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <!-- Page Heading -->
                            <div class="card shadow mb-12">
                                <div class="card-header py-3 <?php echo $cards; ?>">
                                    Payments


                                    <button id="divPrinter" class="btn btn-primary btn-sm btn-circle float-right"
                                        data-toggle="modal" data-target="#paymentModal" title="Add Payment"><i
                                            class="fas fa-credit-card"></i></button>

                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered text-dark">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Payment Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="paymentResult">

                                        </tbody>

                                    </table>
                                    <!-- USE THIS SPACE FOR YOUR ADDITIONAL CODE SNIPPET -->

                                    <!-- END OF YOUR ADDITIONAL CODE SNIPPET -->
                                </div>
                            </div>

                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog"
                            aria-labelledby="paymentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="paymentModalLabel">Add Payment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="paymentForm">
                                            <div class="form-group">
                                                <label for="paymentDate">Date</label>
                                                <input type="date" class="form-control" id="paymentDate"
                                                    name="paymentDate" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="paymentAmount">Amount</label>
                                                <input type="number" class="form-control" id="paymentAmount"
                                                    name="paymentAmount" required step="0.01">
                                            </div>
                                            <div class="form-group">
                                                <label for="paymentType">Payment Type</label>
                                                <select class="form-control" id="paymentType" name="paymentType"
                                                    required>
                                                    <option value="Cash">Cash</option>
                                                    <option value="GCash">GCash</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Maya">Maya</option>
                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                    <option value="Credit Card">Credit Card</option>
                                                    <option value="Debit Card">Debit Card</option>


                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-primary" onclick="submitPaymentForm()">Save
                                            Payment</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
                <div id="signature-modal">
                    <div class="modal-content">
                        <h3>Draw your Signature</h3>
                        <canvas id="signature-pad"></canvas><br>
                        <button onclick="clearPad()">Clear</button>
                        <button onclick="confirmSignature()">Done</button>
                        <button onclick="closeSignatureModal()">Cancel</button>
                    </div>
                </div>
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
            <script src="controllers/logOutConroller.js"></script>
            <script src="controllers/sessionController.js"></script>
            <script src="controllers/soaViewingController.js"></script>
            <script src="controllers/divPrinterController.js"></script>
            <script src="js/signature.js"></script>
            <script src="js/custom.js"></script>


</body>

</html>