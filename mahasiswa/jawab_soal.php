<?php
require_once('../koneksi.php');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $id_soal = $_POST['id_soal'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $jawaban = $_POST['jawaban'];
    $nomor_soal = $_POST['nomor_soal'];

    $sql = "INSERT INTO jawaban_mahasiswa (
                id_soal,
                nama_pengguna_mahasiswa,
                jawaban)
            VALUES(
                '$id_soal',
                '$nama_pengguna',
                '$jawaban'
                )";

    if (mysqli_query($con, $sql)) {
        $response['value'] = 1;
        $response['message'] = 'Soal nomor '.$nomor_soal.' berhasil diisi.';
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = 'Opps! Coba lagi!';
        echo json_encode($response);
    }

    mysqli_close($con);
} else {
    $response['value'] = 0;
    $response['message'] = 'Opps! Coba lagii!';
    echo json_encode($response);
}