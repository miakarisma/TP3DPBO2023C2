<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Profesi.php');
include('classes/Template.php');

$profesi = new Profesi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$profesi->open();
$profesi->getProfesi();

// cari profesi
if (isset($_POST['submit_search'])) {
    // $profesi->getProfesi();
    // methode mencari data pengurus
    $profesi->searchProfesi($_POST['cari']);
} else {
    // sort Profesi
    $sort = isset($_GET['sort']) ? $_GET['sort'] : ''; // Mengambil nilai sort dari parameter query string
    if ($sort === 'asc') {
        $profesi->sortProfesi("id_profesi ASC");
    } else {
        $profesi->sortProfesi("id_profesi DESC");
    }
}

$view = new Template('templates/skintabel.html');
if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($profesi->addProfesi($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'profesi.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'profesi.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'TAMBAH DATA';
    $view->replace('DATA_TITLE', $title);
}

$mainTitle = 'Profesi';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Profesi</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'profesi';

while ($div = $profesi->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_profesi'] . '</td>
    <td style="font-size: 22px;">
        <a href="profesi.php?id=' . $div['id_profesi'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="profesi.php?hapus=' . $div['id_profesi'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

$dataUpdate = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($profesi->updateProfesi($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'profesi.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'profesi.php';
            </script>";
            }
        }

        $profesi->getProfesiById($id);
        $row = $profesi->getResult();

        $dataUpdate = $row['nama_profesi'];
        $btn = 'Simpan';
        $title = 'UBAH DATA';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
        $view->replace('DATA_TITLE', $title);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($profesi->deleteProfesi($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'profesi.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'profesi.php';
            </script>";
        }
    }
}

$profesi->close();
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
// $view->replace('DATA_FORM', $form);
$view->replace('DATA_TABEL', $data);
$view->write();
