<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];

    $suspensi = new Suspensi;
    $insert = $suspensi->insertKategori($nama);
    if ($insert) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menambah kategori suspensi";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menambah kategori suspensi";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
