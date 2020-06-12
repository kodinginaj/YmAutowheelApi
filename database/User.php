<?php

class User
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=db_ymautowheel', 'root', '');
    }

    public function insertAdmin($nama, $email, $password)
    {
        $sql = "INSERT INTO user (nama,email,password,role) VALUES (?,?,?,?) ";
        $stmt = $this->pdo->prepare($sql);
        $data = $stmt->execute([$nama, $email, $password, '1']); // kalo berhasil bakal return 1, kalo gagal 0
        return $data;
    }
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }
}
