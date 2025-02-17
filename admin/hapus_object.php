<?php
    require 'fungsi.php';

    // Cek Login
    session_start();
    if(!isset($_SESSION['login'])) {
        header('location:auth/login.php');
        exit;
    }

    $id_object = $_GET ['id_object'];

    if(empty($id_object)) {
        header('location:object.php');
        exit;
    }
    
    if(hapuswst($id_object) > 0) {
        echo "<script>
            alert('Berhasil');
            document.location.href = 'index.php?page=object';
        </script>";
    } else {
        echo "<script>
            alert('Gagal');
            document.location.href = 'index.php?page=object';
        </script>";
    }
?>