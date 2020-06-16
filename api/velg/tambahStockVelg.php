<?php
require '../../database/Velg.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jumlahTotal = $_POST['jumlahTotal'];
    $jumlahTambah = $_POST['jumlahTambah'];
    $jenis = 'Velg';
    $limit = 8;
    $replika = 0;
    $original = 1;

    $jumlah = $jumlahTotal + $jumlahTambah;
    $velg = new Velg;

    if ($jumlah <= $limit) {
        $cariNotif = $velg->checkNotifikasi($id, $jenis);
        if ($cariNotif) { //Check notifikasi jika sudah ada
            $updateNotif = $velg->updateNotifikasi($id, $jenis, $jumlah);
            if ($jenis) {
                $update = $velg->updateStockVelg($id, $jumlah);
                if ($update) { //update stock
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock velg";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock velg";
                    echo json_encode($data);
                }
            }
        } else { //Jika notifikasi tidak ada
            $dataVelg = $susvelgpensi->getSuspensiById($id);

            if ($dataVelg['kategori_id'] == $replika) {
                $kategori = 'Replika';
            } else {
                $kategori = 'Original';
            }

            $insertNotif = $velg->insertNotifikasi($dataVelg['id'], $jenis, $kategori, $dataVelg['merek_nama'], $dataVelg['spesifikasi'], $jumlah);
            if ($insertNotif) { //masukan notifikasi
                $update = $velg->updateStockVelg($id, $jumlah);
                if ($update) { //update stock
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock velg";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock velg";
                    echo json_encode($data);
                }
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal kirim notifikasi";
                echo json_encode($data);
            }
        }
    } else {
        $cariNotif = $velg->checkNotifikasi($id, $jenis);
        if ($cariNotif) { //Check notifikasi jika sudah ada
            $deleteNotif = $velg->deleteNotifikasi($cariNotif['id']);
            if ($deleteNotif) {
                $update = $velg->updateStockVelg($id, $jumlah);
                if ($update) {
                    $data['status'] = "1";
                    $data['message'] = "Berhasil menambah stock velg";
                    echo json_encode($data);
                } else {
                    $data['status'] = "0";
                    $data['message'] = "Gagal menambah stock velg";
                    echo json_encode($data);
                }
            } else {
                $data['status'] = "0";
                $data['message'] = "Gagal menghapus notifikasi";
                echo json_encode($data);
            }
        } else {
            $update = $velg->updateStockVelg($id, $jumlah);
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
