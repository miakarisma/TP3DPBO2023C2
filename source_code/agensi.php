<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Agensi.php');
include('classes/Template.php');

$agensi = new Agensi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$agensi->open();
$agensi->getAgensi();

// cari Agensi
if (isset($_POST['submit_search'])) {
    // $agensi->getAgensi();
    // methode mencari data pengurus
    $agensi->searchAgensi($_POST['cari']);
} else {
    // sort agensi
    $sort = isset($_GET['sort']) ? $_GET['sort'] : ''; // Mengambil nilai sort dari parameter query string
    if ($sort === 'asc') {
        $agensi->sortAgensi("id_agensi ASC");
    } else {
        $agensi->sortAgensi("id_agensi DESC");
    }
}

$view = new Template('templates/skintabel.html');

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($agensi->addAgensi($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'agensi.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'agensi.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'TAMBAH DATA';
    $view->replace('DATA_TITLE', $title);
}

$mainTitle = 'Agensi';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Agensi</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'Agensi';

while ($div = $agensi->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_agensi'] . '</td>
    <td style="font-size: 22px;">
        <a href="agensi.php?id=' . $div['id_agensi'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="agensi.php?hapus=' . $div['id_agensi'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

$dataUpdate = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($agensi->updateAgensi($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'agensi.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'agensi.php';
            </script>";
            }
        }

        $agensi->getAgensiById($id);
        $row = $agensi->getResult();

        $dataUpdate = $row['nama_agensi'];
        $btn = 'Simpan';
        $title = 'UBAH DATA';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
        $view->replace('DATA_TITLE', $title);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($agensi->deleteAgensi($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'agensi.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'agensi.php';
            </script>";
        }
    }
}

$agensi->close();
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
// $view->replace('DATA_FORM', $form);
$view->replace('DATA_TABEL', $data);
$view->write();