<?php 
include 'header.php'; 
include 'config/connect.php';
if (isset($_GET['id_kelas'])) { 
	$data = $dbh->prepare("DELETE FROM kelas WHERE id_kelas=:idKelas");
	$data->bindParam(":idKelas",$_GET['id_kelas']);
	$data->execute();
	header("location: kelaslist_lokasi.php");
}
include 'footer.php'; ?>