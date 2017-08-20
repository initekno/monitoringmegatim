<?php 
include 'header.php'; 
include 'config/connect.php';
if (!isset($_GET['id_kelas'])) {
		die("Error: id_kelas tidak ditemukan!");
	}
	$data = $dbh->prepare("SELECT * FROM kelas WHERE id_kelas = :idKelas");
	$data->bindParam(":idKelas",$_GET['id_kelas']);
	$data->execute();

	if ($data->rowCount() == 0) {
		die("Error: id_kelas tidak ditemukan kang!");
	}else{
		$row = $data->fetch(PDO::FETCH_LAZY);
	}
	if (isset($_POST['edit'])) {
		$namaKelas = htmlentities($_POST['nama_kel']);
 		$data = $dbh->prepare("UPDATE kelas SET nama_kelas= :namaKelas WHERE id_kelas = :idKelas");
 		$data->bindParam(":namaKelas", $namaKelas);
 		$data->bindParam(":idKelas",$_GET['id_kelas']);
 		$data->execute();
 		header("location: kelaslist_lokasi.php");
	}
?>
	<h3>update kelas</h3>
	<form method="POST" action="">
	<table>
		<tr>
			<td><label>nama kelas</label></td>
			<td><input type="text" class="form-control" name="nama_kel" value="<?php echo $row['nama_kelas'] ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="edit" value="Update" class="btn btn-danger"></td>
		</tr>
	</table>
</form>
<?php include 'footer.php'; ?>