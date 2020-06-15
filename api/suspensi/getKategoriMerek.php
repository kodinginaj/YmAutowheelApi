<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $suspensi = new Suspensi;
    $selectKategori = $suspensi->getKategori();
    if (sizeOf($selectKategori) > 0) {
        for ($i = 0; $i < sizeOf($selectKategori); $i++) {
            $selectMerek = $suspensi->getMerek($selectKategori[$i]['id']);
            if (sizeOf($selectMerek) > 0) {
                $selectKategori[$i]['merek_suspensis'] = $selectMerek;
            } else {
                $selectKategori[$i]['merek_suspensis'] = array();
            }
        }
        $data['status'] = "1";
        $data['message'] = "Data Tersedia";
        $data['kategori_suspensis'] = $selectKategori;
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Data merek kosong";
        $data['kategori_suspensis'] = [];
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
