<?php 
	include'../../koneksi.php';

	//$id = $_POST['id'];
	$nm_lengkap = $_POST['nm_lengkap'];
	$alamat_jln = $_POST['alamat_jln'];
	$alamat_prov = $_POST['alamat_prov'];
	$kode_pos = $_POST['kode_pos'];
	$telepon = $_POST['telepon'];
	$kota = $_POST['kota'];
	$email = $_POST['email'];

	$q_add = "INSERT INTO customer (nm_lengkap, alamat_jln, alamat_prov, kode_pos, telepon, id_kota, email)
						VALUES('$nm_lengkap', '$alamat_jln','$alamat_prov', $kode_pos, $telepon, $kota, '$email')";
	//print_r($q_add);die();
	$result = mysqli_query($conn, $q_add);
	if (!$result) {
	?>
	<script>
		alert('Add GAGAL');
		document.location='../index.php?p=customer';
	</script>
	<?php
	}
	else{
	?>
	<script>
		alert('Add Berhasil');
		document.location='../index.php?p=customer';
	</script>
	<?php

	}
 ?>
