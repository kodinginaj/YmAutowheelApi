<?php
require '../../database/Velg.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $merekId = $_POST['merekId'];

    $velg = new Velg;
    $select = $velg->getVelg($merekId);

    if (sizeOf($select) > 0) {
        $data['status'] = "1";
        $data['message'] = "Data Tersedia";
        $data['velgs'] = $select;
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Data velg kosong";
        $data['velgs'] = [];
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
