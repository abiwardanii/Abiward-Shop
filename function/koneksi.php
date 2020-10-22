<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'abiwardshop';

    $koneksi = mysqli_connect($server, $username, $password, $database) or die ("koneksi gagal");