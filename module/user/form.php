<?php
      
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
      
	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	 
	$row=mysqli_fetch_array($queryUser);
	  
	$nama = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$alamat = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
?>
<form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST">
	  
	<div class="form-group">
		<label>Nama Lengkap</label>	
		<input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" />
	</div>	

	<div class="form-group">
		<label>Email</label>	
		<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" />
	</div>		

	<div class="form-group">
		<label>Phone</label>	
		<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" />
	</div>	

	<div class="form-group">
		<label>Alamat</label>	
		<input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" />
	</div>		

	<div class="form-group">

		<label>Level</label>	

		<div class="form-check form-check-inline">
			<label class="form-check-label" >Superadmin</label>
			<input type="radio" value="superadmin" name="level" class="form-check-input" <?php if($level == "superadmin"){ echo "checked"; } ?> />
		</div>

		<div class="form-check form-check-inline">
			<label class="form-check-label" >Customer</label>
			<input type="radio" value="customer" name="level" class="form-check-input" <?php if($level == "customer"){ echo "checked"; } ?> />		
		</div>

	</div>	

	<div class="form-group">
		<label>Status</label>	
		
		<div class="form-check form-check-inline">
			<label class="form-check-label" >On</label>
			<input type="radio" value="on" name="status" class="form-check-input" <?php if($status == "on"){ echo "checked"; } ?> />
		</div>

		<div class="form-check form-check-inline">
			<label class="form-check-label" >Off</label>
			<input type="radio" value="off" name="status" class="form-check-input" <?php if($status == "off"){ echo "checked"; } ?> />		
		</div>

	</div>		
	  
	<div class="form-group">
		<button class="btn btn-primary" type="submit" name="button" value="<?php echo $button; ?>"  ></button>
	</div>	
</form>