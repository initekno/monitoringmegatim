<?php 
include 'header.php'; 
include 'config/connect.php'; 
?>
	<h3>master kelas</h3>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>nama kelas</th>
				<th><a href="add_newkelas.php">Tambah Kelas Baru</a></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$data = $dbh->prepare("SELECT * FROM kelas");
			$data->execute();
			while ($row = $data->fetch(PDO::FETCH_LAZY)) {
			 ?>
			<tr>
				<td><?php echo $row['nama_kelas']; ?></td>
				<td><a href="edit_listkelas.php?id_kelas=<?php echo $row['id_kelas'];?>">Edit</a> 
					<a href="del_list_kelas.php?id_kelas=<?php echo $row['id_kelas'];?>" onClick = 'return confirm("Anda Yakin Akan Menghapus?")'>Hapus</a></td>
			</tr>
			<?php } ?>
		</tbody>		
	</table>
<?php include 'footer.php'; ?>