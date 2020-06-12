<?php
require '../../database/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $enkripsi = password_hash($password, PASSWORD_BCRYPT);

    $user = new User;
    $insert = $user->insertAdmin($nama, $email, $enkripsi);
    if ($insert > 0) {
        $data['status'] = "1";
        $data['message'] = "Berhasil melakukan registrasi";
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Gagal melakukan registrasi";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
