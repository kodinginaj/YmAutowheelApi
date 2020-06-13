<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $merekId = $_POST['merekId'];
    $tipeId = $_POST['tipeId'];
    $ukuran = $_POST['ukuran'];
    $kadaluarsa = $_POST['kadaluarsa'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $ban = new Ban;
    $insert = $ban->insertBan($merekId, $tipeId, $ukuran, $kadaluarsa, $jumlah, $harga);
    if ($insert > 0) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menambah ban";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menambah ban";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
