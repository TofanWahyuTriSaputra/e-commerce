<?php 
session_start();
if (empty($_SESSION['user'])) 
{
  header('location:../index.php');
}
elseif ($_SESSION['user'] != 1) 
{
  header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>Administrator Twelve</title>
    <meta charset="utf-8"/>

    <link rel="icon" href="../image/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.min.css">
    <!-- DataTables CSS -->
    <link href="../bootstrap/css/bootstrap-social.css" rel="stylesheet">
    <link href="../bootstrap/css/sb-admin.css" rel="stylesheet">
    <link href="../bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/dataTables.bootstrap.min.css">
    <!-- /#wrapper --> <!-- jQuery -->
    <script src="../bootstrap/js/jquery.min.js"></script>

   <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- sp JavaScript -->
    <!-- <script src="../bootstrap/js/jquery.simplePagination.js"></script> -->
   <!-- data tables -->
   <!-- <script src="../bootstrap/js/jquery.dataTables.bootstrap.min.js"></script> -->
   <!-- <script src="../bootstrap/js/jquery.dataTables.min.js"></script>
 -->

 <script type="text/javascript" src="../bootstrap/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand fa fa-apple" href="index.php"> Admin Twelve</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php?p=dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-folder-open fa-arrows-v"></i> Master<i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?p=produk"><i class="fa fa-fw fa-table"></i> Produk</a>
                                </li>
                                <li>
                                    <a href="index.php?p=user"><i class="fa fa-fw fa-table"></i> User</a>
                                </li>
                                <li>
                                    <a href="index.php?p=customer"><i class="fa fa-fw fa-table"></i> Customer</a>
                                </li>
                                <li>
                                    <a href="index.php?p=kota"><i class="fa fa-fw fa-table"></i> Kota</a>
                                </li>
                                <li>
                                    <a href="index.php?p=size"><i class="fa fa-fw fa-table"></i> Size</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?p=a"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                        </li>
                        <li>
                            <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">   
            <div class="row">
            <br>
                <?php
                $pages_dir = 'pages';
                if(!empty($_GET['p'])){
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);
         
                    $p = $_GET['p'];
                    if(in_array($p.'.php', $pages)){
                        include($pages_dir.'/'.$p.'.php');
                    } else {
                        include($pages_dir.'/404.php');
                    }
                } 
                else 
                {
                    include($pages_dir.'/dashboard.php');
                }
                ?>
            </div>
        </div><!--end page-wrapper-->
    </div><!-- end wrapper -->
            <script type="text/javascript">
               $(document).ready(function() {
                    console.log('cek');
                    $('.example').DataTable();
                });
            </script>

    

    
      <!-- Modal sign-out -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i><strong> Yakin Keluar?</strong></h4>
            </div>
            <div class="modal-footer">
              <a href="../logout.php" class="btn btn-primary"><i class="fa fa-fw fa-power-off"></i> Ya</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal-->

</body>

</html>
