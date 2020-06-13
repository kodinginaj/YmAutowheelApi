<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $ban = new Ban;
    $update = $ban->updateMerek($id, $nama);
    if ($update) {
        $data['status'] = "1";
        $data['message'] = "Berhasil mengubah merek";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal mengubah merek";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
