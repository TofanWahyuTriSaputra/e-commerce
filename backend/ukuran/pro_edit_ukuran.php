<?php 
	include'../../koneksi.php';

	$id = $_POST['id'];
	$nm_ukuran = $_POST['nm_ukuran'];
	$harga_ukuran= $_POST['harga_ukuran'];

	$q_update = "UPDATE ukuran SET 
									nm_ukuran = '$nm_ukuran',
									harga_ukuran = $harga_ukuran
							WHERE id_ukuran = $id";
	 //print_r($q_update);die();
	$result = mysqli_query($conn, $q_update);
	if (!$result) {
	?>
	<script>
		alert('UPDATE GAGAL');
		document.location='../index.php?p=size';
	</script>
	<?php
	}
	else{
	?>
	<script>
		alert('UPDATE Berhasil');
		document.location='../index.php?p=size';
	</script>
	<?php

	}
 ?>
