<?php
require_once('../koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $nama_pengguna_dosen = $_POST['nama_pengguna_dosen'];
  $sql = "SELECT * FROM quiz WHERE nama_pengguna_dosen='$nama_pengguna_dosen'";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    $datetime = explode(' ', $row[5]);
    $date = explode('-', $datetime[0]);
    $time = explode(':', $datetime[1]);
    $tahun = $date[0];
    $bulan = ltrim($date[1], '0');
    $tanggal = ltrim($date[2], '0');
    $jam = ltrim($time[0], '0');
    $menit = ltrim($time[1], '0');
    array_push($result, array('id_quiz'=>$row[0], 'nama_pengguna_dosen'=>$row[1], 'judul'=>$row[2], 'jumlah_soal'=>$row[3], 'waktu_pengerjaan_soal'=>$row[4], 'tahun'=>$tahun, 'bulan'=>$bulan, 'tanggal'=>$tanggal, 'jam'=>$jam, 'menit'=>$menit));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}