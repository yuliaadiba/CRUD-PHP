<?php
//memasukkan file config.php
include('config.php');
?>

	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Mahasiswa</font></center>
		<hr>
		<a href="index.php?page=tambah_mhs"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>ID</th>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Email</th>
					<th>Foto</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mhs ORDER BY nim ASC") or die(mysqli_error($koneksi));

				if(mysqli_num_rows($sql) > 0){
					$id = 1;

					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$id.'</td>
							<td>'.$data['nim'].'</td>
							<td>'.$data['nama_mhs'].'</td>
							<td>'.$data['jk'].'</td>
							<td>'.$data['alamat'].'</td>
							<td>'.$data['kota'].'</td>
							<td>'.$data['email'].'</td>
							<td>
								<img src="gambar/' .$data['foto'].'" width="100px">
							</td>
							<td>
								<a href="index.php?page=edit_mhs&nim='.$data['nim'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?nim='.$data['nim'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$id++;
					}
				}
				else{
					echo '
					<tr>
						<td colspan="10">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
