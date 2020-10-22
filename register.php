<?php

	if($user_id){
		header("location: ".BASE_URL);
	}

?>
<div id="container-user-akses">
    <form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST" class="text-center">
    
    <?php 
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
		$email = isset($_GET['email']) ? $_GET['email'] : false;
		$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
		$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

        if($notif == "require"){
            echo "<div class='notif'>Maaf, tolong lengkapi form dibawah ini !</div>";
        }else if($notif == "password"){
            echo "<div class='notif'>Maaf, Password tidak sama silahkan coba lagi</div>";
        }else if($notif == "email"){
            echo "<div class='notif'>Maaf, email yang anda masukan sudah terdaftar</div>";
        }
    ?>

    <div id="register-section">
        <div class="form-group justify-content-center">
            <label class="sr-only">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama" value="<?php echo $nama_lengkap; ?>">
        </div>

        <div class="form-group justify-content-center">
            <label class="sr-only">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
        </div>

        <div class="form-group justify-content-center">
            <label class="sr-only">No. Handphone</label>
            <input type="text" class="form-control" name="phone" placeholder="No.Handphone" value="<?php echo $phone; ?>">
        </div>

        <div class="form-group justify-content-center">
            <label class="sr-only">Alamat</label>
            <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>

        <div class="form-group justify-content-center">
            <label class="sr-only">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="form-group justify-content-center">
            <label class="sr-only">Re-type Password</label>
            <input type="password" class="form-control" name="re_password" placeholder="Re-type Password">
        </div>
    </div>

    <button id="button-register" type="submit" class="btn btn-primary">Register</button>
    
    </form>
</div>