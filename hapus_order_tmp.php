<?php 
	session_id();
	session_start();
if (empty($_SESSION['id_customer'])) {
	header('location:./');
}

	include'koneksi.php';
	$id_order = $_REQUEST['id'];
	$query_hapus = "DELETE FROM order_tmp WHERE id_order_temp={$id_order}";
	//print_r($query_hapus);die();
	$hapus = mysqli_query($conn, $query_hapus);
	if (!$hapus) {
		die('QUERY ERROR!');
	}
	header('location:view_order_produk.php');
 ?>