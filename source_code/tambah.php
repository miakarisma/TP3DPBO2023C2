<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Profesi.php');
include('classes/Agensi.php');
include('classes/Artis.php');
include('classes/Template.php');

$artis = new Artis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$artis->open();

if (isset($_POST['submit'])) {
    if ($artis->addData($_POST, $_FILES) > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'tambah.php';
        </script>";
    }
}

$profesi = new Profesi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$profesi->open();
$profesi->getProfesi();
$dataProfesi = null;
while ($listProfesi = $profesi->getResult()) {
  $id_profesi = $listProfesi['id_profesi'];
  $nama_profesi = $listProfesi['nama_profesi'];
  
  // create input select option
  $dataProfesi .= "
    <option value='". $id_profesi ."'>". $id_profesi ." - ". $nama_profesi ."</option>
  ";
}

$dataAgensi = null;
$agensi = new Agensi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$agensi->open();
$agensi->getAgensi();
while ($listAgensi = $agensi->getResult()) {
  $id_agensi = $listAgensi['id_agensi'];
  $nama_agensi = $listAgensi['nama_agensi'];
  
  // create input select option
  $dataAgensi .= "
  <option value='". $id_agensi ."'>". $id_agensi ." - ". $nama_agensi ."</option>
  ";
}

$artis->close();
$profesi->close();
$agensi->close();
$detail = new Template('templates/skinAddEditData.html');
$detail->replace('DATA_PROFESI', $dataProfesi);
$detail->replace('DATA_AGENSI', $dataAgensi);
$detail->write();