<?php
require '../../database/Velg.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $spesifikasi = $_POST['spesifikasi'];
    $harga = $_POST['harga'];

    $velg = new Velg;
    $update = $velg->updateVelg($id, $spesifikasi, $harga);
    if ($update) {
        $data['status'] = "1";
        $data['message'] = "Berhasil mengubah data velg";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal mengubah data velg";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
