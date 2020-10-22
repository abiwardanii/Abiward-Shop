<?php

	if($user_id){
		header("location: ".BASE_URL);
	}

?>

<div id="container-user-akses">

    <form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST" class="text-center">

    <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

        if($notif == true){
            echo "<div class='notif'>Maaf, Email atau Password yang anda masukan tidak cocok</div>";
        }
    ?>
    <div id="login-section">

        <div class="form-group justify-content-center">
            <label class="sr-only">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>   

        <div class="form-group justify-content-center">
            <label class="sr-only">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        
    </div>

    <button id="button-login" type="submit" class="btn btn-primary">Login</button>
 
    </form>
</div>