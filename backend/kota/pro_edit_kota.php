<?php 
	include'../../koneksi.php';

	$id = $_POST['id'];
	$nm_kota = $_POST['nm_kota'];
	$ongkos= $_POST['ongkos'];

	$q_update = "UPDATE kota SET 
									nm_kota = '$nm_kota',
									ongkos = '$ongkos'
							WHERE id_kota = $id";
	// print_r($q_update);die();
	$result = mysqli_query($conn, $q_update);
	if (!$result) {
	?>
	<script>
		alert('UPDATE GAGAL');
		document.location='../index.php?p=kota';
	</script>
	<?php
	}
	else{
	?>
	<script>
		alert('UPDATE Berhasil');
		document.location='../index.php?p=kota';
	</script>
	<?php

	}
 ?>
