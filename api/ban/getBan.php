<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $merekId = $_POST['merekId'];
    $tipeId = $_POST['tipeId'];

    $ban = new Ban;
    $selectBan = $ban->getBan($merekId, $tipeId);
    if (sizeOf($selectBan) > 0) {
        $data['status'] = "1";
        $data['message'] = "Data Tersedia";
        $data['bans'] = $selectBan;
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Data ban kosong";
        $data['bans'] = [];
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
