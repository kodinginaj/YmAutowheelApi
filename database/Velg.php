<?php

class Velg
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=db_ymautowheel', 'root', '');
    }

    public function deleteVelg($id)
    {
        $sql = "DELETE FROM velg WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function deleteNotifikasi($id)
    {
        $sql = "DELETE FROM notifikasi WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function insertNotifikasi($barangId, $jenis, $merek, $tipe, $keterangan, $stock)
    {
        $sql = "INSERT INTO notifikasi (barang_id, jenis, merek, type, keterangan, stock) VALUES (?,?,?,?,?,?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$barangId, $jenis, $merek, $tipe, $keterangan, $stock]);
        return $data;
    }

    public function getVelgById($id)
    {
        $sql = "SELECT a.*, b.nama AS merek_nama FROM velg a JOIN merek_velg b ON a.merek_velg_id = b.id WHERE a.id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateStockVelg($id, $jumlah)
    {
        $sql = "UPDATE velg SET jumlah = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$jumlah, $id]);
        return $data;
    }

    public function updateNotifikasi($id, $jenis, $jumlah)
    {
        $sql = "UPDATE notifikasi SET stock = ? WHERE barang_id = ? AND jenis = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$jumlah, $id, $jenis]);
        return $data;
    }

    public function checkNotifikasi($id, $jenis)
    {
        $sql = "SELECT * FROM notifikasi WHERE barang_id = ? AND jenis = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $jenis]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertVelg($kategoriId, $merekId, $spesifikasi, $jumlah, $harga)
    {
        $sql = "INSERT INTO velg (kategori_id, merek_velg_id, spesifikasi, jumlah, harga) VALUES (?, ?, ?, ?, ?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$kategoriId, $merekId, $spesifikasi, $jumlah, $harga]);
        return $data;
    }

    public function getVelg($merekId)
    {
        $sql = "SELECT * FROM velg WHERE merek_velg_id = ? ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$merekId]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function searchMerek($kategori, $keyword)
    {
        $sql = "SELECT * FROM merek_velg WHERE kategori = ? AND nama LIKE '%$keyword%'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$kategori]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteMerek($id)
    {
        $sql = "DELETE FROM merek_velg WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function updateMerek($id, $nama)
    {
        $sql = "UPDATE merek_velg SET nama = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama, $id]);
        return $data;
    }

    public function getMerek($kategori)
    {
        $sql = "SELECT * FROM merek_velg WHERE kategori = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$kategori]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertMerek($kategori, $nama)
    {
        $sql = "INSERT INTO merek_velg (kategori, nama) VALUES (?,?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$kategori, $nama]);
        return $data;
    }
}
