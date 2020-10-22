<?php
       
    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
       
    $banner = "";
    $link = "";
    $gambar = "";
	$keterangan_gambar = "";
    $status = "";
       
    $button = "Add";
       
    if($banner_id != "")
    {
        $button = "Update";
		
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
        $row=mysqli_fetch_array($queryBanner);
           
		$banner = $row["banner"];
		$link = $row["link"];
		$gambar = "<img src='". BASE_URL."images/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
		$keterangan_gambar = "(klik 'Pilih Gambar' hanya jika tidak ingin mengganti gambar)";
		$status = $row["status"];
    }   
?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"?>" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Banner</label>	
		<input type="text" name="banner" class="form-control" value="<?php echo $banner; ?>" />
	</div>	

	<div class="form-group">
		<label>Link</label>	
		<input type="text" name="link" class="form-control" value="<?php echo $link; ?>" />
	</div>	   

	<div class="form-group">
		<label>Gambar <?php echo $keterangan_gambar; ?></label>	
		<input type="file" name="file" class="form-control-file" /><?php echo $gambar; ?>
	</div>	  

	<div class="form-group">
		<label>Status</label>

		<div class="form-check form-check-inline">
			<label class="form-check-label" >On</label> 
			<input type="radio" value="on" name="status" class="form-check-input" <?php if($status == "on"){ echo "checked"; } ?> /> On
		</div>

		<div class="form-check form-check-inline">
			<label class="form-check-label" >Off</label> 
			<input type="radio" value="off" name="status" class="form-check-input" <?php if($status == "off"){ echo "checked"; } ?> /> Off		
		</div>
	</div>	   
	   
	<div class="form-group">
		<button><input type="submit" name="button" class="btn btn-primary" value="<?php echo $button; ?>" ></button>
	</div>	
</form>