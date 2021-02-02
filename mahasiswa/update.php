<?php
session_start();
require_once '../helper/connection.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$kota_lahir = $_POST['kota_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$prodi = $_POST['prodi'];
$tahun_masuk = $_POST['tahun_masuk'];

$query = mysqli_query($connection, "UPDATE mahasiswa SET nama = '$nama', jenis_kelamin = '$jenkel', kota_kelahiran = '$kota_lahir', tanggal_kelahiran = '$tanggal_lahir', alamat = '$alamat', program_studi = '$prodi', tahun_masuk = '$tahun_masuk' WHERE nim = '$nim'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
