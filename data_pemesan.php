<?php
	if($user_id == false){
		$_SESSION["proses_pesanan"] = true;
		
		header("location: ".BASE_URL."index.php?page=login");
		exit;
	}
?>
<div class="container">
    <div class="row">
        <div id="frame-data-pengiriman" class="col-md-6">

            <h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>
            
            <div id="frame-form-pengiriman">
            
                <form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
                
                    <div class="form-group">
                        <label>Nama Penerima</label>
                        <input type="text" name="nama_penerima" class='form-control' />
                    </div>		

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" class='form-control' />
                    </div>		
                    
                    <div class="form-group">
                        <label>Alamat Pengiriman</label>
                        <textarea name="alamat" class='form-control'></textarea>
                    </div>			
                    
                    <div class="form-group">
                        <label>Kota</label>
                        
                            <select name="kota" class='form-control'>
                                <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM kota");
                                    
                                    while($row=mysqli_fetch_assoc($query)){
                                        echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
                                    }
                                ?>
                            </select>
                        
                    </div>			

                    <div class="form-group">
                        <button type="submit" value="submit" class='btn btn-primary'>Submit</button>
                    </div>			
                    
                </form>
            </div>
        </div>

        <div id="frame-data-detail" class="col-md-6">
            <h3 class="label-data-pengiriman">Detail Order</h3>
            
            <div id="frame-detail-order">
                
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class='kiri'>Nama Barang</th>
                        <th class='tengah'>Qty</th>
                        <th class='kanan'>Total</th>
                    </tr>
                </thead>	
                    <?php
                        $subtotal = 0;
                        foreach($keranjang AS $key => $value){
                            
                            $barang_id = $key;
                            
                            $nama_barang = $value['nama_barang'];
                            $harga = $value['harga'];
                            $quantity = $value['quantity'];
                            
                            $total = $quantity * $harga;
                            $subtotal = $subtotal + $total;
                        echo "<tbody>";	
                            echo "<tr>
                                    <td class='kiri'>$nama_barang</td>
                                    <td class='tengah'>$quantity</td>
                                    <td class='kanan'>".rupiah($total)."</td>
                                </tr>";
                        }
                        echo "<tr>
                                <td colspan='2' class='kanan'><b>Sub Total</b></td>
                                <td class='kanan'><b>".rupiah($subtotal)."</b></td>
                            </tr>
                            </tbody>";				
                        
                    ?>
                    
                </table>
                
            </div>
        </div>
    </div>
</div>


