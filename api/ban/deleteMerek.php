<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $ban = new Ban;
    $delete = $ban->deleteMerek($id);
    if ($delete) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menghapus merek";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menghapus merek";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
