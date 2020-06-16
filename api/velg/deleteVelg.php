<?php
require '../../database/Velg.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jenis = 'Velg';

    $velg = new Velg;
    $cariNotif = $velg->checkNotifikasi($id, $jenis);
    if ($cariNotif) {
        $deleteNotif = $velg->deleteNotifikasi($cariNotif['id']);
        if ($deleteNotif) {
            $deleteVelg = $velg->deleteVelg($id);
            if ($deleteVelg) {
                $data['status'] = "1";
                $data['message'] = "Berhasil menghapus data velg";
                echo json_encode($data);
            } else {
                $data['status'] = "1";
                $data['message'] = "Gagal menghapus data velg";
                echo json_encode($data);
            }
        } else {
            $data['status'] = "0";
            $data['message'] = "Gagal menghapus notifikasi";
            echo json_encode($data);
        }
    } else {
        $deleteVelg = $velg->deleteVelg($id);
        if ($deleteVelg) {
            $data['status'] = "1";
            $data['message'] = "Berhasil menghapus data velg";
            echo json_encode($data);
        } else {
            $data['status'] = "1";
            $data['message'] = "Gagal menghapus data velg";
            echo json_encode($data);
        }
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
