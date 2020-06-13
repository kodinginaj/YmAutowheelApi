<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $ban = new Ban;
    $delete = $ban->deleteTipe($id);
    if ($delete) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menghapus tipe ban";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menghapus tipe ban";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
