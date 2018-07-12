<?php
require_once('../koneksi.php');
header('Content-type:application/json;charset=utf-8');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $nama_pengguna = $_POST['nama_pengguna'];

    $sql = "SELECT * FROM nilai
            INNER JOIN quiz
            INNER JOIN dosen
            WHERE nama_pengguna_mahasiswa = '$nama_pengguna'
            AND nilai.id_quiz = quiz.id_quiz
            AND quiz.nama_pengguna_dosen = dosen.nama_pengguna_dosen";

    $res = mysqli_query($con, $sql);
    $result = array();
    while ($row = mysqli_fetch_array($res)) {
        $id_nilai = $row['id_nilai'];
        $id_quiz = $row['id_quiz'];
        $nilai_mahasiswa = $row['nilai'];
        $judul_quiz = $row['judul'];
        $nama_dosen = $row['nama_dosen'];
        array_push($result, array(
            'id_nilai' => $id_nilai,
            'id_quiz' => $id_quiz,
            'nilai_mahasiswa' => $nilai_mahasiswa,
            'judul_quiz' => $judul_quiz,
            'nama_dosen' => $nama_dosen
        ));
    }

    echo json_encode(array("value"=>1,"nilai"=>$result));
    mysqli_close($con);
}