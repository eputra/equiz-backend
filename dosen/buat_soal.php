<?php
if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   $id_quiz = $_POST['id_quiz'];
   $soal = $_POST['soal'];
   $pilihan_jawaban = $_POST['pilihan_jawaban'];
   $kunci_jawaban = $_POST['kunci_jawaban'];
   $nomor_soal = $_POST['nomor_soal'];

   require_once('../koneksi.php');
   $sql = "INSERT INTO soal (id_quiz, soal, pilihan_jawaban, kunci_jawaban, nomor_soal) VALUES('$id_quiz', '$soal', '$pilihan_jawaban', '$kunci_jawaban', '$nomor_soal')";
   if(mysqli_query($con,$sql)) {
     $response["value"] = 1;
     $response["message"] = "Soal nomor ".$nomor_soal." berhasil disimpan.";
     echo json_encode($response);
   } else {
     $response["value"] = 0;
     $response["message"] = "Oops! Coba lagi!";
     echo json_encode($response);
   }
   mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "Oops! Coba lagi!";
  echo json_encode($response);
}