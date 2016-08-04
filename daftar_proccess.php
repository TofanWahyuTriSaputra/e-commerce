<?php  
  session_start(); 
	include('koneksi.php');

  $nama = $_POST['nm_lengkap'];
  $alamat = $_POST['alamat'];
  $kd_pos = $_POST['kode_pos'];
  $telp = $_POST['telepon'];
  $kota = $_POST['kota'];
	$email = $_POST['email'];
  $pwd=$_POST['password'];
  $cpassword=$_POST['cpassword'];
	$pass = sha1($_POST['password']);
  $alamat_jln=$_POST['alamat_jln'];
  $alamat_prov=$_POST['alamat_prov']
  $captcha=$_POST['captcha'];

  $answer= $_SESSION['answer'];
  //echo 'captcha'.$captcha;
  //echo 'answer'.$answer;
  //die();
  if ($pwd!==$cpassword) {
?>

  <script type="text/javascript">
  alert('Masukkan Ulang Confirm Password !!!');
  document.location='index.php';
  </script>

   <?php 
   } 
  else if ($captcha!=$answer) {
      ?>
  <script type="text/javascript">
  alert('Masukkan Ulang Confirm Password !!!');
  document.location='index.php';
  </script>

      <?php
      }
      else{
          /* mendapatkan id_customer */
            // $id = mysqli_fetch_array(mysqli_query($conn,"SELECT id_cust FROM customer ORDER BY id_cust desc LIMIT 1"));
            // $id_cust=$id['id_cust']+1;


            // $query_insert_user = "INSERT INTO user (email, pass, level, id_cust)
            //                               VALUES('{$email}', '{$pass}', 3,{$id_cust})";
            $query_insert_customer = "INSERT INTO customer (nm_lengkap, alamat_jln, alamat_prov, kode_pos, email, telepon, id_kota, pass)
                                          VALUES('{$nama}','{$alamat_jln}','{$alamat_prov}',{$kd_pos},'{$email}','{$telp}', {$kota}, '{$pass}')";


          	//print_r($query_insert_user); print_r($query_insert_customer);die();

            try {
                // $quser = mysqli_query($conn,$query_insert_user) or die($query_insert_user);
                $qcustomer  = mysqli_query($conn,$query_insert_customer) or die($query_insert_customer);
                if ($qcustomer) {
                  $_SESSION['user'] = 3;
                  $_SESSION['id_customer'] = $id_cust;
                  ?>

  <script type="text/javascript">
  alert('Proses Daftar Berhasil !!!');
  window.history.back();
  </script>

   <?php
                }
              } catch (Exception $e) {
                echo $e;
              }

           }
  ?>
