<?php   
  session_start();  
  //error_reporting(0);
  if (empty($_SESSION['user'])) 
  {  
    header('location:./');
  }
  else 
  {
    include 'header_in.php';
  }
    include'koneksi.php';
  $id_customer=$_SESSION['id_customer'];

/*--query untuk mengambil info order--*/
    $q_faktur = "SELECT * FROM orders
             WHERE id_cust=$id_customer";
            
    $hasil_f = mysqli_query($conn,$q_faktur);
    $data_f = mysqli_fetch_array($hasil_f);
    $jml = mysqli_num_rows($hasil_f);

    if ($jml==0) {
      echo'<br><br><br><br><br><br>
          <div class="alert alert-danger" role="alert"><center><h1><i class="fa fa-info-circle"></i> 
            Daftar <a href="./" class="alert-link">Belanja </a>Anda Masih Kosong</center></h1>
          </div>';
          die();
    }

/*--query untuk menampilkan informasi customer--*/
    $q_info_customer = "SELECT * FROM customer, kota 
             WHERE customer.id_kota=kota.id_kota 
             AND id_cust=$id_customer";

    $hasil = mysqli_query($conn,$q_info_customer) or die($q_info_customer);
    $data_cust = mysqli_fetch_array($hasil);

    /*--query untuk menampilkan informasi order detail*/
    $faktur = $data_f['no_faktur']; 
    $q_order_detail = "SELECT * FROM order_detail
             WHERE no_faktur = $faktur";
    $hsil = mysqli_query($conn,$q_order_detail) or die($q_order_detail);


          /*mendapatkan biaya pengiriman*/
          $kt= $data_cust['nm_kota'];
          $q_kota = "SELECT ongkos FROM kota WHERE nm_kota='$kt'";
          $r=mysqli_query($conn, $q_kota);
          $d_kota = mysqli_fetch_array($r);

?>
<br>
<br>
<br>
<br>
<?php 
            //print_r($q_update); echo $d_kota['ongkos'];die();
            //$data_u=mysqli_fetch_array(mysqli_query($conn,$q_ukuran));
            //print_r($q_ukuran);die();?>
<div class="container-fluid">
  <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><strong><i class="fa fa-info-circle"></i> Proses Transaksi Selesai</strong></h4>
  </div>

  <!-- <div class="col-md-6"> -->
    <div class="panel panel-default">
      <div class="panel-heading">
          <center><h4><b><i class="fa fa-user"></i> Data Pemesan beserta <i class="fa fa-shopping-cart"></i> Data Order adalah Sebagai Berikut</b></h4></center>
      </div>
      <div class="panel-body">

             <table>
              <tr>
                <td><strong>Nama Lengkap    </strong></td><td> : <b><?php echo $data_cust['nm_lengkap']; ?></b> </td>
              </tr>
              <tr>
                <td><strong>Alamat Lengkap  </strong></td><td> : <b><?php echo $data_cust['alamat']; ?> <?php echo  $data_cust['nm_kota']; ?>  <?php echo $data_cust['kode_pos']; ?></b></td>
              </tr>
              <tr>
                <td><strong>Telpon          </strong></td><td> : <b><?php echo $data_cust['telepon']; ?> </b></td>
              </tr>
              <tr>
                <td><strong>E-mail          </strong></td><td> : <b><?php echo $data_cust['email']; ?> </b></td>
              </tr>
             </table><hr>

             <div class="alert alert-danger" role="alert"><b>Nomor Faktur : <?php echo $data_f['no_faktur'];?>  <span class="pull-right"><i class="fa fa-info-circle"></i> Harap Catat Informasi Ini Untuk Melakukan Konfirmasi Pembayaran Atau Complain</span></b></div>
          
         <?php 
          /*jika data order detai ditemukan*/
          while ($data_ordtl=mysqli_fetch_array($hsil)) {


            /* mendapatkan kode, nama produk*/
            $id_produk=$data_ordtl['id_produk'];
            $q_produk = "SELECT kd_produk, nm_produk FROM produk WHERE id_produk=$id_produk";
            $data_p=mysqli_fetch_array(mysqli_query($conn, $q_produk));
            //print_r($q_produk);//die();

            /* mendapatkan kode, nama produk*/
            $id_ukuran=$data_ordtl['id_ukuran'];
            $q_ukuran = "SELECT harga_ukuran, nm_ukuran  FROM ukuran WHERE id_ukuran=$id_ukuran";
            $data_u=mysqli_fetch_array(mysqli_query($conn,$q_ukuran));
            //print_r($q_ukuran);die();

            echo "<div class='alert alert-default' role='alert'><strong><i class='fa fa-shopping-cart'></i> ".$data_p['kd_produk']." -- ".$data_p['nm_produk']." | Size : ".$data_u['nm_ukuran']." (+Rp.".number_format($data_u['harga_ukuran'],2).") | Qty : ".$data_ordtl['qty_order']." | Discount : ".number_format($data_ordtl['disc'],2)."<span class='pull-right'> Rp. ".number_format($data_ordtl['sub_total'],2)."</span></strong>
             </div>";
          }
            echo"<hr>
                  <div class='alert alert-default' role='alert'>
                    <strong><i class='fa fa-plane'></i> Biaya Pengiriman Ke ".$data_cust['nm_kota']."<span class='pull-right'>Rp. ".number_format($d_kota['ongkos'],2)."</span></strong>
                  </div>

                  <div class='alert alert-default' role='alert'>
                    <strong><i class='fa fa-dollar'></i>   Total Belanja Anda <span class='pull-right'>Rp. ".number_format($data_f['grand_total'],2)."</span></strong>
                  </div>";
          ?>

        <?php  ?>
      </div>
      <div class="panel-footer">
        <center>
          <h4>
            <b><i class="fa fa-user"></i> Data Pemesan beserta <i class="fa fa-shopping-cart"></i> Data Order adalah Sebagai Berikut</b>
          </h4>
        </center>        
      </div>
    </div>
  <!-- </div> -->
 </div><!-- container -->