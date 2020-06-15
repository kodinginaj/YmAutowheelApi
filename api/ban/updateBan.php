<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];

    $ban = new Ban;
    $update = $ban->updateBan($id, $ukuran, $harga);
    if ($update) {
        $data['status'] = "1";
        $data['message'] = "Berhasil mengubah data ban";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal mengubah data ban";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
