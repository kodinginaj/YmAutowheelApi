<?php
require '../../database/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User;
    $select = $user->getUserByEmail($email);
    if ($select) {
        $check = password_verify($password, $select['password']);
        if ($check) {
            $data['status'] = "1";
            $data['message'] = "Berhasil login";
            $data['user'] = $select;
            echo json_encode($data);
        } else {
            $data['status'] = "0";
            $data['message'] = "Password tidak tepat";
            echo json_encode($data);
        }
    } else {
        $data['status'] = "0";
        $data['message'] = "Email belum terdaftar";
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
