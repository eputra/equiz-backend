<?php
if($_SERVER['REQUEST_METHOD']=='POST') {

    $response = array();
    //mendapatakn data
    $nama_pengguna = $_POST['nama_pengguna'];
    $kata_sandi = $_POST['kata_sandi'];

    require_once('../koneksi.php');
    //Cek nama pengguna dan password
    $sql = "SELECT * FROM dosen WHERE nama_pengguna_dosen ='$nama_pengguna' AND kata_sandi_dosen='$kata_sandi'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));
    if(isset($check)) {
        $response["value"] = 1;
        $response["message"] = "Sukses masuk";
        $response["nama"] = $check['nama_dosen'];
        $response["nama_pengguna"] = $check['nama_pengguna_dosen'];
        $response["level"] = "Dosen";
        echo json_encode($response);
    } else {
        $response["value"] = 0;
       $response["message"] = "Oops! Coba lagi!";
       echo json_encode($response);
    }
    // tutup database
    mysqli_close($con);
} else {
    $response["value"] = 0;
    $response["message"] = "Oops! Coba lagi!";
    echo json_encode($response);
}