<?php

class Suspensi
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=db_ymautowheel', 'root', '');
    }

    public function updateSuspensi($id, $spesifikasi, $harga)
    {
        $sql = "UPDATE suspensi SET spesifikasi = ?, harga = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$spesifikasi, $harga, $id]);
        return $data;
    }

    public function searchKategori($keyword)
    {
        $sql = "SELECT * FROM kategori_suspensi WHERE nama LIKE '%$keyword%'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteSuspensi($id)
    {
        $sql = "DELETE FROM suspensi WHERE id = ?";
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

    public function getSuspensiById($id)
    {
        $sql = "SELECT a.*, b.nama AS kategori_nama, c.nama AS merek_nama FROM suspensi a JOIN kategori_suspensi b ON a.kategori_suspensi_id = b.id JOIN merek_suspensi c ON a.merek_suspensi_id = c.id WHERE a.id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateStockSuspensi($id, $jumlah)
    {
        $sql = "UPDATE suspensi SET jumlah = ? WHERE id = ?";
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
        $sql = "SELECT * FROM `notifikasi` WHERE barang_id = ? AND jenis = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $jenis]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertSuspensi($kategoriId, $merekId, $spesifikasi, $jumlah, $harga)
    {
        $sql = "INSERT INTO suspensi (kategori_suspensi_id ,merek_suspensi_id, spesifikasi, jumlah, harga) VALUES (?, ?, ?, ?, ?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$kategoriId, $merekId, $spesifikasi, $jumlah, $harga]);
        return $data;
    }

    public function getSuspensi($kategoriId, $merekId)
    {
        $sql = "SELECT * FROM suspensi WHERE kategori_suspensi_id = ? AND merek_suspensi_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$kategoriId, $merekId]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }


    public function getMerek($id)
    {
        $sql = "SELECT * FROM merek_suspensi WHERE kategori_suspensi_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function getKategori()
    {
        $sql = "SELECT * FROM kategori_suspensi";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteMerek($id)
    {
        $sql = "DELETE FROM merek_suspensi WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function updateMerek($id, $nama)
    {
        $sql = "UPDATE merek_suspensi SET nama = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama, $id]);
        return $data;
    }

    public function insertMerek($kategoriId, $nama)
    {
        $sql = "INSERT INTO merek_suspensi (kategori_suspensi_id ,nama) VALUES (?, ?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$kategoriId, $nama]);
        return $data;
    }

    public function deleteKategori($id)
    {
        $sql = "DELETE FROM kategori_suspensi WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$id]);
        return $data;
    }

    public function updateKategori($id, $nama)
    {
        $sql = "UPDATE kategori_suspensi SET nama = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama, $id]);
        return $data;
    }

    public function insertKategori($nama)
    {
        $sql = "INSERT INTO kategori_suspensi (nama) VALUES (?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama]);
        return $data;
    }
}
