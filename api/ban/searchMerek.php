<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keyword = $_POST['keyword'];

    $ban = new Ban;
    $selectMerek = $ban->searchMerek($keyword);
    if (sizeOf($selectMerek) > 0) {
        for ($i = 0; $i < sizeOf($selectMerek); $i++) {
            $selectTipe = $ban->getTipe($selectMerek[$i]['id']);
            if (sizeOf($selectTipe) > 0) {
                $selectMerek[$i]['tipe_bans'] = $selectTipe;
            } else {
                $selectMerek[$i]['tipe_bans'] = [];
            }
        }
        $data['status'] = "1";
        $data['message'] = "Data Tersedia";
        $data['merek_bans'] = $selectMerek;
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Data merek kosong";
        $data['merek_bans'] = [];
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
