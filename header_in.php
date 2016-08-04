<head>
	<link rel="icon" href="image/favicon.ico" type="image/x-icon" />
	<title>TWELVE INC APPAREL </title>
        <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-social.css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


</head>
<body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./"><span class="fa fa-apple"></span> Twelve Inc</a>
                </div>


                <div class="collapse navbar-collapse pull-right">
                    <ul class="nav navbar-nav">
                        <!-- <li><a href=""><i class="fa fa-check-circle"></i> Konfirmasi Pembayaran</a></li> -->
                        <li><a href="view_order_produk.php"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>
                        <li><a href="crpesan.php"><i class="fa fa-question-circle"></i> Cara Pesan</a></li>
                        <li><a href="about.php"><i class="fa fa-info-circle"></i> About</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modLogout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    </ul>

                </div>
            </div>
        </div>

      <!-- Modal sign-out -->
      <div class="modal fade" id="modLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i><strong> Yakin Keluar?</strong></h4>
            </div>
            <div class="modal-footer">
              <a href="logout.php" class="btn btn-primary"><i class="fa fa-fw fa-power-off"></i> Ya</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal-->

</body>