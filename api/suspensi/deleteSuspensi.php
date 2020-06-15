<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jenis = 'Suspensi';

    $suspensi = new Suspensi;
    $cariNotif = $suspensi->checkNotifikasi($id, $jenis);
    if ($cariNotif) {
        $deleteNotif = $suspensi->deleteNotifikasi($cariNotif['id']);
        if ($deleteNotif) {
            $deleteSuspensi = $suspensi->deleteSuspensi($id);
            if ($deleteSuspensi) {
                $data['status'] = "1";
                $data['message'] = "Berhasil menghapus data suspensi";
                echo json_encode($data);
            } else {
                $data['status'] = "1";
                $data['message'] = "Gagal menghapus data suspensi";
                echo json_encode($data);
            }
        } else {
            $data['status'] = "0";
            $data['message'] = "Gagal menghapus notifikasi";
            echo json_encode($data);
        }
    } else {
        $deleteSuspensi = $suspensi->deleteSuspensi($id);
        if ($deleteSuspensi) {
            $data['status'] = "1";
            $data['message'] = "Berhasil menghapus data suspensi";
            echo json_encode($data);
        } else {
            $data['status'] = "1";
            $data['message'] = "Gagal menghapus data suspensi";
            echo json_encode($data);
        }
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
