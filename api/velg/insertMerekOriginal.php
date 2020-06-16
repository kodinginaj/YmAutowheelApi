<?php
require '../../database/Velg.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = '1';
    $nama = $_POST['nama'];

    $velg = new Velg;
    $insert = $velg->insertMerek($kategori, $nama);
    if ($insert) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menambah merek velg";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menambah merek velg";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
