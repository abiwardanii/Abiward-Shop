<?php
	if($totalBarang == 0){
		echo "<h3>Saat ini belum ada data di dalam keranjang belanja anda</h3>";
	}else{
	
		$no=1;
		
        echo "<table class='table'>
                <thead class='thead-dark'>
				<tr class='baris-title'>
					<th class='tengah'>No</th>
					<th class='kiri'>Image</th>
					<th class='kiri'>Nama Barang</th>
					<th class='tengah'>Qty</th>
					<th class='kanan'>Harga Satuan</th>
					<th class='kanan'>Total</th>
                </tr>
                </thead>";
		
		$subtotal = 0;		
		foreach($keranjang AS $key => $value){
			$barang_id = $key;
			
			$nama_barang = $value["nama_barang"];
			$quantity = $value["quantity"];
			$gambar = $value["gambar"];
			$harga = $value["harga"];
			
			$total = $quantity * $harga;
			$subtotal = $subtotal + $total;
            echo "<tbody>";	

			echo "<tr>
					<td class='tengah'>$no</td>
					<td class='kiri'><img src='".BASE_URL."images/barang/$gambar' height='100px' /></td>
					<td class='kiri'>$nama_barang</td>
					<td class='tengah'><input type='text' name='$barang_id' value='$quantity' class='update-quantity text-center' style='width:30px;' /></td>
					<td class='kanan'>".rupiah($harga)."</td>
					<td class='kanan hapus_item'>".rupiah($total)." <a href='".BASE_URL."hapus_item.php?barang_id=$barang_id' class='btn btn-dark btn-sm'>X</a></td>
				</tr>";
				
			$no++;	
		
		}
		
		echo "<tr>
				<td colspan='5' class='kanan'><b>Sub Total</b></td>
				<td class='kanan'><b>".rupiah($subtotal)."</b></td>
			  </tr>";
        echo "<tbody>";	

		echo "</table>";
	
		echo "<div id='frame-button-keranjang'>
				<a id='lanjut-belanja' href='".BASE_URL."index.php' class='btn btn-primary'>< Lanjut Belanja</a>
				<a id='lanjut-pemesanan' href='".BASE_URL."index.php?page=data_pemesan' class='btn btn-primary float-right'>Lanjut Pemesanan ></a>
			  </div>";
	
	}

?>
 
<script>

	$(".update-quantity").on("input", function(e){
		var barang_id = $(this).attr("name");
		var value = $(this).val();
		
		$.ajax({
			method: "POST",
			url: "update_keranjang.php",
			data: "barang_id="+barang_id+"&value="+value
		})
		.done(function(data){
			location.reload();
		});
		
	});

</script>