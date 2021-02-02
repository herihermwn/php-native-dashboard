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

$query = mysqli_query($connection, "insert into mahasiswa (nim, nama, jenis_kelamin, kota_kelahiran, tanggal_kelahiran, alamat, program_studi, tahun_masuk) value('$nim', '$nama', '$jenkel', '$kota_lahir', '$tanggal_lahir', '$alamat', '$prodi', '$tahun_masuk')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
