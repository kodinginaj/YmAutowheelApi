<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];

    $ban = new Ban;
    $insert = $ban->insertMerekBan($nama);
    if ($insert > 0) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menambah merek";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menambah merek";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
