<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Profesi.php');
include('classes/Agensi.php');
include('classes/Artis.php');
include('classes/Template.php');

// buat instance artis
$listArtis = new Artis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listArtis->open();
// tampilkan data artis
$listArtis->getArtisJoin();

// cari artis
if (isset($_POST['submit_search'])) {
    // methode mencari data artis
    $listArtis->searchArtis($_POST['cari']);
} else {
    // sort profesi
    $sort = isset($_GET['sort']) ? $_GET['sort'] : ''; // Mengambil nilai sort dari parameter query string
    if ($sort === 'asc') {
        $listArtis->sortArtis("id_artis ASC");
    } else {
        $listArtis->sortArtis("id_artis DESC");
    }
}

$data = null;

// ambil data artis
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listArtis->getResult()) {
    $data .= '<div class="col-4 gx-2 gy-3 justify-content-between">' .
        '<div class="card pt-4 px-2 artis-thumbnail" style="height: 260px;">
        <a href="detail.php?id=' . $row['id_artis'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['image'] . '" class="card-img-top" alt="' . $row['image'] . '">
            </div>
            <div class="card-body">
                <p class="card-text artis-nama my-0">' . $row['nama'] . '</p>
                <p class="card-text artis-nama my-0">' . $row['status_karir'] . '</p>
                <p class="card-text profesi-nama">' . $row['nama_profesi'] . '</p>
                <p class="card-text agensi-nama my-0">' . $row['nama_agensi'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listArtis->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_ARTIS', $data);
$home->write();