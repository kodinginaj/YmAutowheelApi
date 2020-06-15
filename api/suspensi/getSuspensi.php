<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategoriId = $_POST['kategoriId'];
    $merekId = $_POST['merekId'];

    $suspensi = new Suspensi;
    $selectSuspensi = $suspensi->getSuspensi($kategoriId, $merekId);
    if (sizeOf($selectSuspensi) > 0) {
        $data['status'] = "1";
        $data['message'] = "Data Tersedia";
        $data['suspensis'] = $selectSuspensi;
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Data suspensi kosong";
        $data['suspensis'] = [];
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
