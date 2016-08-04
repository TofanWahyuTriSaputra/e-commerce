<?php 
	$host="localhost";
	$usr="root";
	$pass="root";
	$db="twelve";

	$conn = mysqli_connect($host, $usr, $pass, $db);

	if (!$conn) 
	{
		die('KONEKSI GAGAL'.mysqli_connect_error());
	}
 ?>