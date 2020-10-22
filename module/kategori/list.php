<div id="frame-tambah" class="text-right">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form"; ?>" class="btn btn-primary" role="button">+ Tambah Kategori</a>
</div>

<?php

	$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
	
	if(mysqli_num_rows($queryKategori) == 0){
		echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
	}else{
	
		echo "<table class='table'>";
		echo "<thead class='thead-dark'>";
		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Kategori</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			 </tr>";
		echo "</thead>";
		$no=1;
		while($row=mysqli_fetch_assoc($queryKategori)){
		echo "<tbody>";	
			echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[kategori]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='btn btn-primary btn-sm' href='".BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
					</td>
				  </tr>";
				  
			$no++;
		}
		echo "<tbody>";
		echo "</table>";
	
	}

?>