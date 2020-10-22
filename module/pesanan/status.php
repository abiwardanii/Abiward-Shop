<?php

	$pesanan_id = $_GET["pesanan_id"];

	$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
	$row=mysqli_fetch_assoc($query);
	$status = $row['status'];
	
?>
<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
	 
	<div class="form-group">
		<label>Pesanan Id (Faktur Id)</label>    
		<input type="text" value="<?php echo $pesanan_id; ?>" name="pesanan_id" readonly="true" class="form-control" />
	</div>  

	<div class="form-group">
		<label>Status</label>
		<span>
			<select name="status" class="form-control">
				<?php
				
					foreach($arrayStatusPesanan AS $key => $value){
						if($status == $key){
							echo "<option value='$key' selected='true'>$value</option>";
						}
						else{
							echo "<option value='$key'>$value</option>";
						}
					}
				
				?>
			</select>
		</span>
	</div>	
	
	<div class="form-group">
		<button class="btn btn-primary" type="submit" value="Edit Status" name="button" >Edit</button>
	</div>	
	
</form>  