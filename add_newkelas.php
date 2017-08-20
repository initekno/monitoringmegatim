<?php 
include 'header.php'; 
include 'config/connect.php';
if (isset($_POST['simpan'])) {
 	$namaKelas = htmlentities($_POST['nama_kel']);
 	$data = $dbh->prepare("INSERT INTO kelas(nama_kelas) VALUES(:namaKelas)");
 	$data->bindParam(":namaKelas", $namaKelas);
 	$data->execute();
 	header("location: kelaslist_lokasi.php");
 } 
?>
	<h3>add new kelas</h3>
	<form method="POST" action="">
	<table>
		<tr>
			<td><label>nama kelas</label></td>
			<td><input type="text" name="nama_kel" required="required" class="form-control" placeholder="masukkan nama kelas"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="simpan" value="Simpan" class="btn btn-success"></td>
		</tr>
	</table>
</form>
<?php include 'footer.php'; ?>