<?php
include '../koneksi.php';
header('Content-type:application/json;charset=utf-8');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $id_quiz = $_POST['id_quiz'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $nomor_soal = $_POST['nomor_soal'];

    $sql = "SELECT * FROM soal
            WHERE id_quiz = '$id_quiz'
            AND nomor_soal = '$nomor_soal'";
    $res = mysqli_fetch_array(mysqli_query($con, $sql));
    $id_soal = $res['id_soal'];
    $response['value'] = 1;
    $response['message'] = 'Jawaban ditemukan.';
    $response['id_soal'] = $res['id_soal'];
    $response['id_quiz'] = $res['id_quiz'];
    $response['soal'] = $res['soal'];
    $response['pilihan_jawaban'] = $res['pilihan_jawaban'];
    $response['kunci_jawaban'] = $res['kunci_jawaban'];
    $response['nomor_soal'] = $res['nomor_soal'];

    $sql2 = "SELECT * FROM jawaban_mahasiswa
             WHERE id_soal = '$id_soal'
             AND nama_pengguna_mahasiswa = '$nama_pengguna'";
    $res2 = mysqli_fetch_array(mysqli_query($con, $sql2));
    if (isset($res2)) {
        $response['jawaban_mahasiswa'] = $res2['jawaban'];
    } else {
        $response['jawaban_mahasiswa'] = 'N';
    }

    $sql3 = "SELECT jumlah_soal FROM quiz
             WHERE id_quiz = '$id_quiz'";
    $res3 = mysqli_fetch_array(mysqli_query($con, $sql3));
    $response['jumlah_soal'] = $res3['jumlah_soal'];

    echo json_encode($response);
}