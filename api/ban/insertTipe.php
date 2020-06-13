<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $merekId = $_POST['merekId'];
    $nama = $_POST['nama'];

    $ban = new Ban;
    $insert = $ban->insertTipeBan($merekId, $nama);
    if ($insert > 0) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menambah tipe ban";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menambah tipe ban";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
