<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$prodi = mysqli_query($connection, "SELECT * FROM prodi");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Mahasiswa</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>NIM</td>
                <td><input class="form-control" type="number" name="nim"></td>
              </tr>
              <tr>
                <td>Nama Mahasiswa</td>
                <td><input class="form-control" type="text" name="nama"></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select class="form-control" name="jenkel" id="jenkel" required>
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Kota Kelahiran</td>
                <td><input class="form-control" type="text" name="kota_lahir" size="20"></td>
              </tr>
              <tr>
                <td>Tanggal Kelahiran</td>
                <td><input class="form-control" type="date" id="datepicker" name="tanggal_lahir"></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" class="form-control"></textarea></td>
              </tr>
              <tr>
                <td>Program Studi</td>
                <td>
                  <select class="form-control" name="prodi" id="prodi" required>
                    <option value="">--Pilih Program Studi--</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Tahun Masuk</td>
                <td>
                  <select class="form-control" name="tahun_masuk" id="tahun_masuk" required>
                    <option value="">--Pilih Tahun Masuk--</option>
                    <?php
                    for ($x = 2015; $x <= 2021; $x++) {
                    ?>
                      <option value=<?= $x ?>><?= $x ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>