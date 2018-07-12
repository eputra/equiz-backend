<?php
if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $id_quiz = $_POST['id_quiz'];
   $nama_pengguna_dosen = $_POST['nama_pengguna_dosen'];
   $judul = $_POST['judul'];
   $jumlah_soal = $_POST['jumlah_soal'];
   $waktu_pengerjaan_soal = $_POST['waktu_pengerjaan_soal'];
   $tahun = $_POST['tahun'];
   $bulan = str_pad($_POST['bulan'], 2, '0', STR_PAD_LEFT);
   $tanggal = str_pad($_POST['tanggal'], 2, '0', STR_PAD_LEFT);
   $jam = str_pad($_POST['jam'], 2, '0', STR_PAD_LEFT);
   $menit = str_pad($_POST['menit'], 2, '0', STR_PAD_LEFT);
   $datetime = $tahun.'-'.$bulan.'-'.$tanggal.' '.$jam.':'.$menit.':'.'00';

   require_once('../koneksi.php');
   $sql = "INSERT INTO quiz (id_quiz, nama_pengguna_dosen, judul, jumlah_soal, waktu_pengerjaan_soal, waktu_akhir_pengerjaan, terbit) VALUES('$id_quiz', '$nama_pengguna_dosen', '$judul', '$jumlah_soal', '$waktu_pengerjaan_soal', '$datetime', '0')";
   if(mysqli_query($con,$sql)) {
     $response["value"] = 1;
     $response["message"] = "Sukses membuat quiz";
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