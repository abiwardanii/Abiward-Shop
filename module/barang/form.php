<?php

	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
	
	$nama_barang = "";
	$kategori_id = "";
	$gambar = "";
	$spesifikasi = "";
	$stok = "";
	$harga = "";
	$status = "";
	$keterangan_gambar = "";
	$button = "Add";

	if($barang_id){
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
		$row = mysqli_fetch_assoc($query);
		
		$nama_barang = $row['nama_barang'];
		$kategori_id = $row['kategori_id'];
		$spesifikasi = $row['spesifikasi'];
		$gambar = $row['gambar'];
		$harga = $row['harga'];
		$stok = $row['stok'];
		$status = $row['status'];
		$button = "Update";

		$keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
		$gambar = "<img src='".BASE_URL."images/barang/$gambar'	style='width: 200px;vertical-align: middle;'/>";

	}
?>

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label> Kategori </label> 
		<select class="form-control" name="kategori_id">
			<?php
				$query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
					while($row=mysqli_fetch_assoc($query)){
						if($kategori_id == $row['kategori_id']){
							echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
						} else {
							echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
						}
					}
			?>	
		</select>
	</div>

	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama_barang" class="form-control" value="<?php echo $nama_barang; ?>" />
	</div>

	<div class="form-group">
		<label>Spesifikasi</label>
		<textarea class="form-control ckeditor" name="spesifikasi" rows="3" id="editor"><?php echo $spesifikasi; ?> </textarea>
	</div>

	<div class="form-group">
		<label>Stok Barang</label>
		<input type="text" name="stok" class="form-control" value="<?php echo $stok; ?>" />
	</div>

	<div class="form-group">
		<label>Harga</label>
		<input type="text" name="harga" class="form-control" value="<?php echo $harga; ?>" />
	</div>

	<div class="form-group">
		<label>Gambar Produk <?php echo $keterangan_gambar; ?> </label>
		<input type="file" class="form-control-file" name="file"><?php echo $gambar; ?>
	</div>

	<div class="form-group">
		<label>Status</label>
		
		<div class="form-check form-check-inline"> 
			<input type="radio" name="status" value="on" class="form-check-input" <?php if($status == "on"){ echo "checked='true'"; } ?> /> 
			<label class="form-check-label" >On</label>
		</div>

		<div class="form-check form-check-inline">	
			<input type="radio" name="status" value="off" class="form-check-input" <?php if($status == "off"){ echo "checked='true'"; } ?> /> 
			<label class="form-check-label" >Off</label>
		</div>
		
	</div>	

	<div class="form-group">
		<button type="submit" name="button" class="btn btn-primary" value="<?php echo $button; ?>">Add</button>
	</div>


</form>
