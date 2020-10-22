<div class="container">
    <div class="row">
        <div class="col-md-2">
            <?php
                echo kategori ($kategori_id);
            ?>
        </div>

        <div class="col-md-10">
            <div class="card">
            <?php    
            $barang_id = $_GET['barang_id'];
		
		    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
		    $row = mysqli_fetch_assoc($query);
            echo"    <div class='card-header font-weight-bold'>
                    $row[nama_barang]
                </div>

                <img src='".BASE_URL."images/barang/$row[gambar]' alt='gambar_detail'>

                <div class='card-body'>
                    <p class='card-text font-weight-bold text-danger'>".rupiah($row['harga'])."</p>
                    <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]' class='btn btn-primary'>+ Add to cart</a>
                </div>

                <div class='card-body'>
                    <p>$row[spesifikasi]</p>
                </div>";
            ?>
            </div>
        </div>
    </div>
</div>