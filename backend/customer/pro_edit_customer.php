<?php 
	include'../../koneksi.php';

	$id = $_POST['id'];
	$nm_lengkap = $_POST['nm_lengkap'];
	$alamat_jln = $_POST['alamat_jln'];
	$alamat_prov = $_POST['alamat_prov'];
	$kode_pos = $_POST['kode_pos'];
	$telepon = $_POST['telepon'];
	$kota = $_POST['kota'];
	$email = $_POST['email'];

	$q_update = "UPDATE customer SET 
									nm_lengkap = '$nm_lengkap',
									alamat_jln = '$alamat_jln',
									alamat_prov = '$alamat_prov',
									kode_pos = $kode_pos,
									telepon = $telepon,
									id_kota = $kota,
									email = '$email'
							WHERE id_cust = $id";
	//print_r($q_update);die();
	$result = mysqli_query($conn, $q_update);
	if (!$result) {
	?>
	<script>
		alert('UPDATE GAGAL');
		document.location='../index.php?p=customer';
	</script>
	<?php
	}
	else{
	?>
	<script>
		alert('UPDATE Berhasil');
		document.location='../index.php?p=customer';
	</script>
	<?php

	}
 ?>
