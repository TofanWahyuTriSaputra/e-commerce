<?php 
	include'../../koneksi.php';

	//$id = $_POST['id'];
	$nm_kota = $_POST['nm_kota'];
	$ongkos= $_POST['ongkos'];

	$q_add = "INSERT INTO kota (nm_kota, ongkos)
						VALUES('$nm_kota', $ongkos)";
	//print_r($q_add);die();
	$result = mysqli_query($conn, $q_add);
	if (!$result) {
	?>
	<script>
		alert('Add GAGAL');
		document.location='../index.php?p=kota';
	</script>
	<?php
	}
	else{
	?>
	<script>
		alert('Add Berhasil');
		document.location='../index.php?p=kota';
	</script>
	<?php

	}
 ?>
