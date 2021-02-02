<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$matkul = $_POST['matkul'];
$semester = $_POST['semester'];
$nilai = $_POST['nilai'];

$query = mysqli_query($connection, "UPDATE nilai SET nim='$nim', kode_matkul = '$matkul', semester = '$semester', nilai = '$nilai' WHERE id='$id'");

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
