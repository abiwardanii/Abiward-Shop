<?php

	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$kategori = "";
	$status = "";
	$button = "Add";

	if($kategori_id){
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
		$row = mysqli_fetch_assoc($queryKategori);
		
		$kategori = $row['kategori'];
		$status = $row['status'];
		$button = "Update";
	}
?>

<form action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST">

	<div class="form-group">
		<label> Kategori </label>
		<input type="text" name="kategori" value="<?php echo $kategori; ?>"/>
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