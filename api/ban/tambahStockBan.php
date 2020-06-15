<?php
require '../../database/Ban.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jumlahTotal = $_POST['jumlahTotal'];
    $jumlahTambah = $_POST['jumlahTambah'];
    $jenis = 'Ban';
    $limit = 8;

    $jumlah = $jumlahTotal + $jumlahTambah;
    $ban = new Ban;

    if ($jumlah <= $limit) {
        $cariNotif = $ban->checkNotifikasi($id, $jenis);
        if ($cariNotif) { //Check notifikasi jika sudah ada
            $updateNotif = $ban->updateNotifikasi($id, $jenis, $jumlah);
            if ($jenis) {
                $update = $ban->updateStockBan($id, $jumlah);
                if ($update) { //update stock
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock ban";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock ban";
                    echo json_encode($data);
                }
            }
        } else { //Jika notifikasi tidak ada
            $dataBan = $ban->getBanById($id);
            $insertNotif = $ban->insertNotifikasi($dataBan['id'], $jenis, $dataBan['merek_nama'], $dataBan['tipe_nama'], $dataBan['ukuran'], $jumlah);
            if ($insertNotif) { //masukan notifikasi
                $update = $ban->updateStockBan($id, $jumlah);
                if ($update) { //update stock
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock ban";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock ban";
                    echo json_encode($data);
                }
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal kirim notifikasi";
                echo json_encode($data);
            }
        }
    } else {
        $cariNotif = $ban->checkNotifikasi($id, $jenis);
        if (sizeOf($cariNotif) > 0) { //Check notifikasi jika sudah ada
            $deleteNotif = $ban->deleteNotifikasi($cariNotif['id']);
            if ($deleteNotif) {
                $update = $ban->updateStockBan($id, $jumlah);
                if ($update) {
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock ban";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock ban";
                    echo json_encode($data);
                }
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal menghapus notifikasi";
                echo json_encode($data);
            }
        } else {
            $update = $ban->updateStockBan($id, $jumlah);
            if ($update) {
                $data['status'] = "1";
                $data['message'] = "Berhasil menambah stock ban";
                echo json_encode($data);
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal menambah stock ban";
                echo json_encode($data);
            }
        }
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
