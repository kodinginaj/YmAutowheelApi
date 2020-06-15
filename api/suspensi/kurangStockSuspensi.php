<?php
require '../../database/Suspensi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jumlahTotal = $_POST['jumlahTotal'];
    $jumlahKurang = $_POST['jumlahKurang'];
    $jenis = 'Suspensi';
    $limit = 8;

    $jumlah = $jumlahTotal - $jumlahKurang;
    $suspensi = new Suspensi;

    if ($jumlah >= 0) { // jika jumlah lebih dari 0
        if ($jumlah <= $limit) {
            $cariNotif = $suspensi->checkNotifikasi($id, $jenis);
            if ($cariNotif) { //Check notifikasi jika sudah ada
                $updateNotif = $suspensi->updateNotifikasi($id, $jenis, $jumlah);
                if ($jenis) {
                    $update = $suspensi->updateStockSuspensi($id, $jumlah);
                    if ($update) { //update stock
                        $data['status'] = "1";
                        $data['message'] = "Berhasil mengurangi stock suspensi";
                        echo json_encode($data);
                    } else {
                        $data['status'] = "0";
                        $data['message'] = "Gagal mengurangi stock suspensi";
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
                        $data['message'] = "Berhasil mengurangi stock suspensi";
                        echo json_encode($data);
                    } else {
                        $data['status'] = "0";
                        $data['message'] = "Gagal mengurangi stock suspensi";
                        echo json_encode($data);
                    }
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal kirim notifikasi";
                    echo json_encode($data);
                }
            }
        } else {
            $update = $suspensi->updateStockSuspensi($id, $jumlah);
            if ($update) {
                $data['status'] = "1";
                $data['message'] = "Berhasil mengurangi stock suspensi";
                echo json_encode($data);
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal mengurangi stock suspensi";
                echo json_encode($data);
            }
        }
    } else {
        $data['status'] = "0";
        $data['message'] = "Stock kurang dari " . $jumlahKurang;
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
