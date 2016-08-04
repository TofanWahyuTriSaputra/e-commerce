<?php  
  session_start(); 
	include('koneksi.php');

	$email = $_POST['email'];
	$pass = sha1($_POST['password']);

	$query = "SELECT * FROM admin WHERE email='{$email}' AND pass='{$pass}'";
	//print_r($query);die();
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_array($result);
	$row = mysqli_num_rows($result);
  //var_dump($data['level']);die();
	if ($row == 0)
  	{
      $queryu = "SELECT * FROM customer WHERE email='{$email}' AND pass='{$pass}'";
      //print_r($query);die();
      $resultu = mysqli_query($conn, $queryu);
      $datau = mysqli_fetch_array($resultu);
      $rowu = mysqli_num_rows($resultu);
      if ($rowu==0)
      {             
   ?>
       	<script type="text/javascript">
       	alert('User Tidak Ditemukan !!!');
       	document.location='index.php';
       	</script>
   <?php
      }
      else
      {

        $_SESSION['user'] = 3;
        $_SESSION['id_customer'] = $datau['id_cust'];           
   ?>
        <script type="text/javascript">
        alert('Login Berhasil !!!');
        document.location='index.php';
        </script>
   <?php
      } 
   	} //end if
  	else
  	{
  		
  			$_SESSION['user'] = 1;
  			header('location:backend/');
  		
  	}
  ?>
