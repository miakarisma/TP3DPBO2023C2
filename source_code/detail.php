<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Profesi.php');
include('classes/Agensi.php');
include('classes/Artis.php');
include('classes/Template.php');

$artis = new Artis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$artis->open();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $artis->getArtisById($id);
        // echo $id;
        $row = $artis->getResult();

        $data .= '<div class="card-header text-center bg-success bg-opacity-10">
        <h3 class="my-0">Detail ' . $row['nama'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['image'] . '" class="img-thumbnail" alt="' . $row['image'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama'] . '</td>
                                </tr>
                                <tr>
                                    <td>Status Karir</td>
                                    <td>:</td>
                                    <td>' . $row['status_karir'] . '</td>
                                </tr>
                                <tr>
                                    <td>Tahun Debut</td>
                                    <td>:</td>
                                    <td>' . $row['tahun_debut'] . '</td>
                                </tr>
                                <tr>
                                    <td>Profesi</td>
                                    <td>:</td>
                                    <td>' . $row['nama_profesi'] . '</td>
                                </tr>
                                <tr>
                                    <td>Agensi</td>
                                    <td>:</td>
                                    <td>' . $row['nama_agensi'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-success bg-opacity-10 text-end">
                <a href="detailedit.php?id_edit='. $id .'"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="detailhapus.php?id_hapus='. $id .'"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$artis->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_ARTIS', $data);
$detail->write();
