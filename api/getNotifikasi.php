<?php
require '../database/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $user = new User;
    $select = $user->getNotif();
    if (sizeOf($select) > 0) {
        $data['status'] = "1";
        $data['message'] = "Data Tersedia";
        $data['notifications'] = $select;
        echo json_encode($data);
    } else {
        $data['status'] = "0";
        $data['message'] = "Data ban kosong";
        $data['notifications'] = [];
        echo json_encode($data);
    }
} else {
    $data['status'] = "0";
    $data['message'] = "Ada kesalahan";
    echo json_encode($data);
}
