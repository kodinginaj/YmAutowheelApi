<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jenis = 'Ban';

    $ban = new Ban;
    $cariNotif = $ban->checkNotifikasi($id, $jenis);
    if ($cariNotif) {
        $deleteNotif = $ban->deleteNotifikasi($cariNotif['id']);
        if ($deleteNotif) {
            $deleteBan = $ban->deleteBan($id);
            if ($deleteBan) {
                $data['status'] = "1";
                $data['message'] = "Berhasil menghapus data ban";
                echo json_encode($data);
            } else {
                $data['status'] = "1";
                $data['message'] = "Gagal menghapus data ban";
                echo json_encode($data);
            }
        } else {
            $data['status'] = "0";
            $data['message'] = "Gagal menghapus notifikasi";
            echo json_encode($data);
        }
    } else {
        $deleteBan = $ban->deleteBan($id);
        if ($deleteBan) {
            $data['status'] = "1";
            $data['message'] = "Berhasil menghapus data ban";
            echo json_encode($data);
        } else {
            $data['status'] = "1";
            $data['message'] = "Gagal menghapus data ban";
            echo json_encode($data);
        }
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
