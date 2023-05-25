<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Profesi.php');
include('classes/Agensi.php');
include('classes/Artis.php');
include('classes/Template.php');

$artis = new Artis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$artis->open();

if(isset($_GET['id_hapus'])){
    $key = $_GET['id_hapus'];
    if ($key > 0) {
        if ($artis->deleteData($key) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
    }
}

$artis->close();