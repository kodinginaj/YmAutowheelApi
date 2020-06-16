<?php
require '../../database/Velg.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $velg = new Velg;
    $delete = $velg->deleteMerek($id);
    if ($delete) {
        $data['status'] = "1";
        $data['message'] = "Berhasil menghapus merek velg";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal menghapus merek velg";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
