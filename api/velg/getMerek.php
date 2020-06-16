<?php
require '../../database/Velg.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $velg = new Velg;
    $selectVelgOri = $velg->getMerek('1');
    $selectVelgReplika = $velg->getMerek('0');

    if (sizeOf($selectVelgOri) > 0 || sizeOf($selectVelgReplika) > 0) {
        $data['status'] = "1";
        $data['message'] = "Data Tersedia";
    } else {
        $data['status'] = "0";
        $data['message'] = "Data suspensi kosong";
    }

    if (sizeOf($selectVelgOri) > 0) {
        $data['velg_originals'] = $selectVelgOri;
    } else {
        $data['velg_originals'] = [];
    }

    if (sizeOf($selectVelgReplika) > 0) {
        $data['velg_replikas'] = $selectVelgReplika;
    } else {
        $data['velg_replikas'] = [];
    }
    echo json_encode($data);
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
