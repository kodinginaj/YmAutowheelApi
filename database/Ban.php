<?php

class Ban
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=db_ymautowheel', 'root', '');
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
