<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $spesifikasi = $_POST['spesifikasi'];
    $harga = $_POST['harga'];

    $suspensi = new Suspensi;
    $update = $suspensi->updateSuspensi($id, $spesifikasi, $harga);
    if ($update) {
        $data['status'] = "1";
        $data['message'] = "Berhasil mengubah data suspensi";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal mengubah data suspensi";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
