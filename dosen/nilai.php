<?php
include '../koneksi.php';
header('Content-type:application/json;charset=utf-8');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id_quiz = $_POST['id_quiz'];

    $sql = "SELECT * FROM nilai
            INNER JOIN mahasiswa
            WHERE id_quiz = '$id_quiz'
            AND nilai.nama_pengguna_mahasiswa = mahasiswa.nama_pengguna_mahasiswa";

    $res = mysqli_query($con, $sql);
    $result = array();
    while ($row = mysqli_fetch_array($res)) {
        $id_nilai = $row['id_nilai'];
        $id_quiz = $row['id_quiz'];
        $nama_pengguna = $row['nama_pengguna_mahasiswa'];
        $nama_mahasiswa = $row['nama_mahasiswa'];
        $nilai_mahasiswa = $row['nilai'];
        array_push($result, array(
            'id_nilai' => $id_nilai,
            'id_quiz' => $id_quiz,
            'nama_pengguna' => $nama_pengguna,
            'nama_mahasiswa' => $nama_mahasiswa,
            'nilai_mahasiswa' => $nilai_mahasiswa
        ));
    }

    echo json_encode(array("value"=>1,"nilai_quiz"=>$result));
    mysqli_close($con);
}