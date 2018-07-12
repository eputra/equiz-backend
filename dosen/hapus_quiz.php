<?php
require_once('../koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $response = array();
  //mendapatkan data
  $id_quiz = $_POST['id_quiz'];
  $sql = "DELETE FROM quiz WHERE id_quiz = '$id_quiz'";
  if(mysqli_query($con,$sql)) {
    $response["value"] = 1;
    $response["message"] = "Berhasil dihapus";
    echo json_encode($response);
  } else {
    $response["value"] = 0;
    $response["message"] = "Oops! Gagal dihapus!";
    echo json_encode($response);
  }
  mysqli_close($con);
}