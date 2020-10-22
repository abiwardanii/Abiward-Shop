<?php
    session_start();

    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abiward-Shop</title>

    <!-- css -->
    <link rel="stylesheet" href="<?php echo BASE_URL."css/style.css"; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- font-form -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">
</head>
<body>
    <div id="container">
        <div id="header">
            <a href="<?php echo BASE_URL."index.php"; ?>">
                <img src="<?php echo BASE_URL."images/logoshop.png"; ?>" alt="logo"/>
            </a>

            <div id="menu">
                <div id="user" class ="text-white">

                    <?php
                        if($user_id){
                            echo "Hi <b>$nama</b>,
                                <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
                                <a href='".BASE_URL."logout.php'>Logout</a>";
                        }else{
                        echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
                            <a href='".BASE_URL."index.php?page=register'>Register</a>";
                        }
                    ?>

                </div>

                <a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="keranjang" class="btn btn-warning float-right">
                    <img src="<?php echo BASE_URL."images/cart.png"; ?>" alt="cart"/>  
                    <?php
                        if($totalBarang != 0){
                            echo "<span class='total-barang'>$totalBarang</span>";
                        }
                    ?>
                </a> 
            </div>
        </div>

        <div id="content" class="overflow-hidden">
            <?php
                $filename = "$page.php";
                
                if(file_exists($filename)){
                    include_once($filename);
                } else {
                    include_once("main.php");
                }
            ?>
        
        </div>

        <div id="footer">
            <p class="text-white text-right font-italic">Copyright Abiward-shop 2020</p>
        </div>
    </div>
</body>
</html>