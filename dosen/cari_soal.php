<?php
require_once('../koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $id_quiz = $_POST['id_quiz'];
    $nomor_soal = $_POST['nomor_soal'];
    $sql = "SELECT * FROM soal
            WHERE id_quiz = '$id_quiz'
            AND nomor_soal = '$nomor_soal'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));
    if (isset($check)) {
        $response['value'] = 1;
        $response['message'] = 'Soal ditemukan.';
        $response['id_soal'] = $check['id_soal'];
        $response['id_quiz'] = $check['id_quiz'];
        $response['soal'] = $check['soal'];
        $response['pilihan_jawaban'] = $check['pilihan_jawaban'];
        $response['kunci_jawaban'] = $check['kunci_jawaban'];
        $response['nomor_soal'] = $check['nomor_soal'];
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "Oops! Soal tidak ditemukan!";
        echo json_encode($response);
    }
    mysqli_close($con);
} else {
    $response["value"] = 0;
    $response["message"] = "Oops! Coba lagi!";
    echo json_encode($response);
}
?>