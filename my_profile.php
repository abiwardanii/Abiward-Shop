<?php
	
	if($user_id){
		$module = isset($_GET['module']) ? $_GET['module'] : false;
		$action = isset($_GET['action']) ? $_GET['action'] : false;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
	}else{
		header("location: ".BASE_URL."index.php?page=login");
	}

	admin_only($module, $level);
?>
<div id="bg-page-profile" class="overflow-hidden">

    <div id="menu-profile" class="list-group float-left">
	<?php 
		if($level == "superadmin"){
	?>
        <a <?php if($module == "kategori"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list"; ?>" class="list-group-item list-group-item-action list-group-item-primary">Kategori</a>
        <a <?php if($module == "barang"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>" class="list-group-item list-group-item-action list-group-item-primary">Barang</a>
        <a <?php if($module == "kota"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list"; ?>" class="list-group-item list-group-item-action list-group-item-primary">Kota</a>
        <a <?php if($module == "user"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>" class="list-group-item list-group-item-action list-group-item-primary">User</a>
        <a <?php if($module == "banner"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list"; ?>" class="list-group-item list-group-item-action list-group-item-primary">Banner</a>
	<?php
		}
	?>	
        <a <?php if($module == "pesanan"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>" class="list-group-item list-group-item-action list-group-item-primary">Pesanan</a>

    </div>

    <div id="profile-content" class="float-left">
        <?php
			$file = "module/$module/$action.php";
			if(file_exists($file)){
				include_once($file);
			}else{
				echo "<h3>Maaf, halaman tersebut tidak ditemukan</h3>";
			} 
		?>
    </div>
</div>