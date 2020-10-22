<?php

	$pesanan_id = $_GET["pesanan_id"];

?>

<table class="table">

	<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
	
		<div class="form-group">
			<label>Nomor Rekening</label>
			<input type="text" name="nomor_rekening" class="form-control" />
		</div>	

		<div class="form-group">
			<label>Nama Account</label>
			<input type="text" name="nama_account" class="form-control" />
		</div>		
	
		<div class="form-group">
			<label>Tanggal Transfer (format: yyyy-mm-dd)</label>
			<input type="text" name="tanggal_transfer" class="form-control" />
		</div>	

		<div class="form-group">
			<button type="submit" value="Konfirmasi" name="button" class="btn btn-primary" >Konfrimasi</button>
		</div>		
	
	</form>

</table>