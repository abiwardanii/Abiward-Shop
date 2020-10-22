<div class="container">
    <div class="row">
        <div class="col-md-2">
        <?php
            echo kategori ($kategori_id);
        ?>
        </div>

        <div class="col-md-10">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                    <?php
                        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
                        while($rowBanner=mysqli_fetch_assoc($queryBanner)){
                        echo " <div class='carousel-item active'>
                        <a href='".BASE_URL."$rowBanner[link]'><img src='".BASE_URL."images/slide/$rowBanner[gambar]' class='d-block w-100' alt='gambar''></a>
                        </div>";
                        }
                    ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                
            </div>

            <div class="col-md-12">
                <div class="row">
                <?php
                if($kategori_id){
                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
                }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
                }

                    while($row=mysqli_fetch_assoc($query)){

                    echo    "<div class='col-md-4'>
                                <div class='card text-center'>
                                    <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
                                        <img src='".BASE_URL."images/barang/$row[gambar]' class='card-img-top' alt='gambar' />
                                    </a>
                                    <div class='card-body'>
                                        <h5 class='card-title'>
                                            <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a>
                                        </h5>
                                        <p class='card-text'>Stok : $row[stok]</p>
                                        <p class='card-text'>".rupiah($row['harga'])."</p>
                                        <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]' class='btn btn-primary'>+ Add to cart </a>
                                    </div>
                                </div>
                             </div>";
                    }
                ?>            
                </div>
            </div>
        </div>
    </div>
</div>