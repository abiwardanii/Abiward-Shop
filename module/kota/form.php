<?php

	$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;
	
	$kota = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	if($kota_id){
		$queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
		$row=mysqli_fetch_assoc($queryKota);
		
		$kota = $row['kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		
		$button = "Update";
	}
		
?>		
<form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"?>" method="post">

	<div class="form-group">
		<label>Kota</label>	
		<input type="text" name="kota" class="form-control" value="<?php echo $kota; ?>" />
	</div>		

	<div class="form-group">
		<label>Tarif</label>	
		<input type="text" name="tarif" class="form-control" value="<?php echo $tarif; ?>" />
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
		<button type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary" ></button>
	</div>		

</form>		