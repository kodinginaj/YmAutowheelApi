<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jumlahTotal = $_POST['jumlahTotal'];
    $jumlahTambah = $_POST['jumlahTambah'];
    $jenis = 'Suspensi';
    $limit = 8;

    $jumlah = $jumlahTotal + $jumlahTambah;
    $suspensi = new Suspensi;

    if ($jumlah <= $limit) {
        $cariNotif = $suspensi->checkNotifikasi($id, $jenis);
        if ($cariNotif) { //Check notifikasi jika sudah ada
            $updateNotif = $suspensi->updateNotifikasi($id, $jenis, $jumlah);
            if ($jenis) {
                $update = $suspensi->updateStockSuspensi($id, $jumlah);
                if ($update) { //update stock
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock suspensi";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock suspensi";
                    echo json_encode($data);
                }
            }
        } else { //Jika notifikasi tidak ada
            $dataSuspensi = $suspensi->getSuspensiById($id);
            $insertNotif = $suspensi->insertNotifikasi($dataSuspensi['id'], $jenis, $dataSuspensi['kategori_nama'], $dataSuspensi['merek_nama'], $dataSuspensi['spesifikasi'], $jumlah);
            if ($insertNotif) { //masukan notifikasi
                $update = $suspensi->updateStockSuspensi($id, $jumlah);
                if ($update) { //update stock
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock suspensi";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock suspensi";
                    echo json_encode($data);
                }
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal kirim notifikasi";
                echo json_encode($data);
            }
        }
    } else {
        $cariNotif = $suspensi->checkNotifikasi($id, $jenis);
        if ($cariNotif) { //Check notifikasi jika sudah ada
            $deleteNotif = $suspensi->deleteNotifikasi($cariNotif['id']);
            if ($deleteNotif) {
                $update = $suspensi->updateStockSuspensi($id, $jumlah);
                if ($update) {
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock suspensi";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock suspensi";
                    echo json_encode($data);
                }
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal menghapus notifikasi";
                echo json_encode($data);
            }
        } else {
            $update = $suspensi->updateStockSuspensi($id, $jumlah);
            if ($update) {
                $data['status'] = "1";
                $data['message'] = "Berhasil menambah stock suspensi";
                echo json_encode($data);
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal menambah stock suspensi";
                echo json_encode($data);
            }
        }
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
