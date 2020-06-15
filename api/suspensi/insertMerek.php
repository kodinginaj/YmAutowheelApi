<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategoriId = $_POST['kategoriId'];
    $nama = $_POST['nama'];

    $suspensi = new Suspensi;
    $insert = $suspensi->insertMerek($kategoriId, $nama);
    if ($insert) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menambah merek suspensi";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menambah merek suspensi";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
