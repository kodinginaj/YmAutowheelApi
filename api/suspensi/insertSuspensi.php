<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategoriId = $_POST['kategoriId'];
    $merekId = $_POST['merekId'];
    $spesifikasi = $_POST['spesifikasi'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $suspensi = new Suspensi;
    $insert = $suspensi->insertSuspensi($kategoriId, $merekId, $spesifikasi, $jumlah, $harga);
    if ($insert) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menambahkan suspensi";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menambahkan suspensi";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
