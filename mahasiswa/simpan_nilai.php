<?php
require_once('../koneksi.php');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $id_quiz = $_POST['id_quiz'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $nilai = $_POST['nilai'];
    
    $sql = "INSERT INTO nilai(
                id_quiz,
                nama_pengguna_mahasiswa,
                nilai)
            VALUES(
                '$id_quiz',
                '$nama_pengguna',
                '$nilai')";

    if (mysqli_query($con, $sql)) {
        $response['value'] = 1;
        $response['message'] = "Berhasil";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal";
        echo json_encode($response);
    }
} else {
    $response['value'] = 0;
    $response['message'] = "Oops! Coba lagi!";
    echo json_encode($response);
}