<?php

class Ban
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=db_ymautowheel', 'root', '');
    }


    public function insertNotifikasi($barangId, $jenis, $merek, $tipe, $keterangan, $stock)
    {
        $sql = "INSERT INTO notifikasi (barang_id, jenis, merek, type, keterangan, stock) VALUES (?,?,?,?,?,?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$barangId, $jenis, $merek, $tipe, $keterangan, $stock]);
        return $data;
    }

    public function checkNotifikasi($id, $jenis)
    {
        $sql = "SELECT * FROM `notifikasi` WHERE barang_id = ? AND jenis = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $jenis]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateNotifikasi($id, $jenis, $jumlah)
    {
        $sql = "UPDATE notifikasi SET stock = ? WHERE barang_id = ? AND jenis = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$jumlah, $id, $jenis]);
        return $data;
    }

    public function deleteNotifikasi($id)
    {
        $sql = "DELETE FROM notifikasi WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function getBanById($id)
    {
        $sql = "SELECT a.*, b.nama AS merek_nama, c.nama AS tipe_nama FROM ban a JOIN merek_ban b ON a.merek_ban_id = b.id JOIN tipe_ban c ON a.tipe_ban_id = c.id WHERE a.id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateStockBan($id, $jumlah)
    {
        $sql = "UPDATE ban SET jumlah = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$jumlah, $id]);
        return $data;
    }

    public function updateBan($id, $ukuran, $harga)
    {
        $sql = "UPDATE ban SET ukuran = ?, harga = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$ukuran, $harga, $id]);
        return $data;
    }

    public function deleteBan($id)
    {
        $sql = "DELETE FROM ban WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }


    public function deleteMerek($id)
    {
        $sql = "DELETE FROM merek_ban WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function deleteTipe($id)
    {
        $sql = "DELETE FROM tipe_ban WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function updateMerek($id, $nama)
    {
        $sql = "UPDATE merek_ban SET nama = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama, $id]);
        return $data;
    }

    public function updateTipe($id, $nama)
    {
        $sql = "UPDATE tipe_ban SET nama = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama, $id]);
        return $data;
    }

    public function insertBan($merekId, $tipeId, $ukuran, $kadaluarsa, $jumlah, $harga)
    {
        $sql = "INSERT INTO ban (merek_ban_id, tipe_ban_id, ukuran, kadaluarsa, jumlah, harga) VALUES (?,?,?,?,?,?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$merekId, $tipeId, $ukuran, $kadaluarsa, $jumlah, $harga]);
        return $data;
    }

    public function insertMerekBan($nama)
    {
        $sql = "INSERT INTO merek_ban (nama) VALUES (?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama]);
        return $data;
    }

    public function insertTipeBan($merekId, $nama)
    {
        $sql = "INSERT INTO tipe_ban (merek_ban_id, nama) VALUES (?,?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$merekId, $nama]);
        return $data;
    }

    public function getBan($merekId, $tipeId)
    {
        $sql = "SELECT * FROM ban WHERE merek_ban_id = ? AND tipe_ban_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$merekId, $tipeId]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function getMerek()
    {
        $sql = "SELECT * FROM merek_ban";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function getTipe($id)
    {
        $sql = "SELECT * FROM tipe_ban WHERE merek_ban_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
}
