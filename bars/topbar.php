<?php
include_once("properties.php");
error_reporting(0);
session_start();

echo '
<link href="css/custom.css" rel="stylesheet">
 <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-white topbar mb-4 static-top shadow">


                     
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <strong>

';

echo $systemname;
echo '</strong>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                       
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $_SESSION["username"] . '</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="#" onclick="backup()">
                                    <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Backup
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                            
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
     
';

include_once("bars/toast.php");

?>