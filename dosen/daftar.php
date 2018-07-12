<?php
if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $nama_pengguna = $_POST['nama_pengguna'];
   $nama = $_POST['nama'];
   $kata_sandi = $_POST['kata_sandi'];

   require_once('../koneksi.php');
   //Cek npm sudah terdaftar apa belum
   $sql = "SELECT * FROM dosen WHERE nama_pengguna_dosen ='$nama_pengguna'";
   $check = mysqli_fetch_array(mysqli_query($con,$sql));
   if(isset($check)){
     $response["value"] = 0;
     $response["message"] = "Oops! nama pengguna sudah terdaftar!";
     echo json_encode($response);
   } else {
     $sql = "INSERT INTO dosen (nama_pengguna_dosen,nama_dosen,kata_sandi_dosen) VALUES('$nama_pengguna','$nama','$kata_sandi')";
     if(mysqli_query($con,$sql)) {
        $response["value"] = 1;
        $response["message"] = "Sukses mendaftar";
        $response["nama"] = $nama;
        $response["nama_pengguna"] = $nama_pengguna;
        $response["level"] = "Dosen";
       echo json_encode($response);
     } else {
       $response["value"] = 0;
       $response["message"] = "Oops! Coba lagi!";
       echo json_encode($response);
     }
   }
   // tutup database
   mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "Oops! Coba lagi!";
  echo json_encode($response);
}