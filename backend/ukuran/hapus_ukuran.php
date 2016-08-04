<?php 
	session_id();
	session_start();
	if (empty($_SESSION['user'])) 
	{
	  header('location:../index.php');
	}
	elseif ($_SESSION['user'] != 1) 
	{
	  header('location:../index.php');
}


	include'../../koneksi.php';
	$id = $_REQUEST['id'];
	$query_hapus = "DELETE FROM ukuran WHERE id_ukuran={$id}";
	print_r($query_hapus);die();
	$hapus = mysqli_query($conn, $query_hapus);
	if (!$hapus) {
?>
	<script>
		alert('Hapus GAGAL');
		document.location='../index.php?p=size';
	</script>
<?php
	} else{
?>
	<script>
		alert('Hapus Berhasil');
		document.location='../index.php?p=size';
	</script>
<?php

	}
 ?>
