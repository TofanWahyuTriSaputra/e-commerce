<head>
	<link rel="icon" href="image/favicon.ico" type="image/x-icon" />
	<title>TWELVE INC APPAREL </title>
        <!-- Bootstrap -->
    <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-social.css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/dataTables.bootstrap.min.css">

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="bootstrap/js/bootstrap.js"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- <script src="bootstrap/js/bootstrap-scroll-modal.js"></script> -->
 <script type="text/javascript" src="bootstrap/js/jquery.dataTables.min.js"></script>


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
                        <li>
                            <a href="#" data-toggle="modal" data-target="#modalLogin"><i class="fa fa-user"></i> Masuk || <i class="fa fa-group"></i> Daftar</a>
                        </li>
                        <li><a href="crpesan.php"><i class="fa fa-question-circle"></i> Cara Pesan</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modAbout"><i class="fa fa-info-circle"></i> About</a></li>
                    </ul>

                </div>
            </div>

        </div>
        

<!-- Modal login-->
  <div class="modal fade" id="modalLogin" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content col-md-6 col-md-offset-3">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-user"></span> Masuk</h3>
        </div>
        <div class="modal-body">
            <form role="form" action="login_proccess.php" method="post">
                <div class="form-group">
                  <label for="usrname"><span class="fa fa-envelope"></span> Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autofocus required>
                </div>
                <div class="form-group">
                  <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                  <input type="password" class="form-control" id="psw" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                </div>            
            </form>
        </div>
        <div class="modal-footer">            
            <span align="center">Belum Punya Akun? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modalRegister"> Daftar</a></span>
        </div>
      </div>
      
    </div>
  </div> 
<!--end Modal login  -->

<!-- Modal Register-->
  <div class="modal fade" id="modalRegister" role="dialog" aria-hidden="true">

    <div class="modal-dialog">

<!-- <script type="text/javascript">

  function checkForm(form)
  {
    if(this.password.value !== this.cpassword.value) {
      alert("Masukkan Lagi Confirm Password");
      this.cpassword.focus();
      return false;
    }
    if(this.captcha.value !== <?//php echo $_SESSION['answer']; ?>) {
      alert("Jawaban Kamu Salah");
      this.captcha.focus();
      return false;
    }
  }

</script> -->
    
<?php
    $digit1 = mt_rand(1,10);
    $digit2 = mt_rand(1,10);
    if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $_SESSION['answer'] = $digit1 + $digit2;
    } else {
            $math = "$digit1 * $digit2";
            $_SESSION['answer'] = $digit1 * $digit2;
    }
?>

      <!-- Modal content-->
      <div class="modal-content col-md-8 col-md-offset-2">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-group"></span> Daftar Akun Baru</h3>
        </div>
        <div class="modal-body">
            <form role="form" name="register" action="daftar_proccess.php" method="post" id="register">
                <div class="form-group">
                            <label><span><i class="fa fa-user"></i> Nama Lengkap</span></label>
                            <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" placeholder="Nama Lengkap" required value="">
                </div>  
                <div class="form-group">
                    <label><span><i class="fa fa-home"></i> Alamat Lengkap</span></label>
                    <textarea class="form-control" name="alamat_jln" id="alamat_jln" required placeholder="Alamat Lengkap.. jl. .. Ds. "></textarea>
                    <label><span><i class="fa fa-globe"></i> Provinsi</span></label>
                    <select name="alamat_prov" class="form-control" value="1" id="prov">
                        <option value="DIY">DIY</option>
                        <option value="JATENG">JATENG</option>
                        <option value="JABAR">JABAR</option>
                        <option value="JATIM">JATIM</option>
                    </select>
                    <label><span><i class="fa fa-globe"></i> Kota</span></label>
                    <select name="kota" class="form-control" value="1" id="kota">
                        <option value="1">Yogyakarta</option>
                        <option value="2">Solo</option>
                        <option value="3">Magelang</option>
                        <option value="4">Semarang</option>
                    </select>
                </div>     
                <div class="form-group">
                    <label><span><i class="fa fa-circle "></i> Kode Pos</span></label>
                    <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos"
                             onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
                             onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
                              required value="">
                </div>
                <div class="form-group">
                    <label><span><i class="fa fa-phone"></i> No Telepon</span></label>
                    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No Telepon"
                             onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
                             onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
                              required value="">
                </div>  
                <div class="form-group">
                    <label><span><i class="fa fa-envelope"></i> Email</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="">
                </div>   
                <div class="form-group">
                  <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                  <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter password" required>
                </div>   
                <div class="form-group">
                    <label><span class="fa fa-check"></span><?php echo 'Berapa Hasil Dari ' . $math . " = ?"; ?></label>
                    <input type="text" placeholder="Hasil" id="captcha" name="captcha" class="form-control" required
                             onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
                             onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')">
                </div>    
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
                </div>  
            </form>
        </div>
        <div class="modal-footer">            
            <span align="center">Sudah Punya Akun? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modalLogin"> Masuk</a></span>
        </div>
      </div>
      
    </div>
  </div> 
<!--end Modal Register  -->
</body>
