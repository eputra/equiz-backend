<?php
require('../koneksi.php');
header('Content-type:application/json;charset=utf-8');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $id_quiz = $_POST['id_quiz'];
    $sql = "UPDATE quiz
            SET terbit = '1'
            WHERE id_quiz = '$id_quiz'";
    if (mysqli_query($con, $sql)) {
        $response["value"] = 1;
        $response["message"] = "Berhasil menerbitkan quiz.";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
        $response["message"] = "Oops! Gagal menerbitkan quiz.!!";
        echo json_encode($response);
    }
}