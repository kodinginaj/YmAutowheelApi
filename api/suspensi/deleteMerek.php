<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $suspensi = new Suspensi;
    $delete = $suspensi->deleteMerek($id);
    if ($delete) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menghapus merek suspensi";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menghapus merek suspensi";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
