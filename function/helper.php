<?php
    define ("BASE_URL", "http://localhost/AbiwardShop/");

    $arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran Sedang Di Validasi";
	$arrayStatusPesanan[2] = "Lunas";
    $arrayStatusPesanan[3] = "Pembayaran Di Tolak";
    
    function rupiah ($nilai = 0){
        $string = "Rp,".number_format($nilai);
        return $string;
    }

    function kategori ($kategori_id = false){
        global $koneksi;
        $string = "<div class='list-group' id='menu-kategori'> ";

        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status ='on'");
        while($row=mysqli_fetch_assoc($query)){
            if($kategori_id == $row['kategori_id']){
                echo "<a class='text-decoration-none font-weight-bold list-group-item list-group-item-action active' href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a>";
            } else {
                echo "<a class='text-decoration-none font-weight-bold list-group-item list-group-item-action' href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a>";

            }
        }
        $string = "</div>";
    }

    function admin_only($module, $level){
        if($level != "superadmin"){
            $admin_pages = array("kategori", "barang", "kota", "user", "banner");
            if(in_array($module, $admin_pages)){
                header("location:".BASE_URL);
            }
        }
    }
?>