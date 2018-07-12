<?php
require_once('../koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $id_quiz = $_POST['id_quiz'];
    $soal = $_POST['soal'];
    $pilihan_jawaban = $_POST['pilihan_jawaban'];
    $kunci_jawaban = $_POST['kunci_jawaban'];
    $nomor_soal = $_POST['nomor_soal'];

    $sql = "UPDATE soal
            SET soal = '$soal',
                pilihan_jawaban = '$pilihan_jawaban',
                kunci_jawaban = '$kunci_jawaban'
            WHERE id_quiz = '$id_quiz'
            AND nomor_soal = '$nomor_soal'";

    if (mysqli_query($con, $sql)) {
        $response["value"] = 1;
        $response["message"] = "Berhasil diubah";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "Oops! Gagal merubah!!";
        echo json_encode($response);
    }

    mysqli_close($con);
} else {
    $response["value"] = 0;
    $response["message"] = "Oops! Coba lagi!";
    echo json_encode($response);
}