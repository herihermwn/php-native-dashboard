<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nim = $_GET['nim'];
$query = mysqli_query($connection, "SELECT * FROM mahasiswa WHERE nim='$nim'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Mahasiswa</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>NIM</td>
                  <td><input class="form-control" required value="<?= $row['nim'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Mahasiswa</td>
                  <td><input class="form-control" type="text" name="nama" required value="<?= $row['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>
                    <select class="form-control" name="jenkel" id="jenkel" required>
                      <option value="Pria" <?php if ($row['jenis_kelamin'] == "Pria") {
                                              echo "selected";
                                            } ?>>Pria</option>
                      <option value="Wanita" <?php if ($row['jenis_kelamin'] == "Wanita") {
                                                echo "selected";
                                              } ?>>Wanita</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Kota Kelahiran</td>
                  <td><input class="form-control" type="text" name="kota_lahir" required value="<?= $row['kota_kelahiran'] ?>"></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><input class="form-control" type="date" name="tanggal_lahir" required value="<?= $row['tanggal_kelahiran'] ?>"></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td colspan="3"><textarea class="form-control" name="alamat" id="alamat" required><?= $row['alamat'] ?></textarea></td>
                </tr>
                <tr>
                  <td>Program Studi</td>
                  <td>
                    <select class="form-control" name="prodi" id="prodi" required>
                      <option value="Teknik Informatika" <?php if ($row['program_studi'] == "Teknik Informatika") {
                                                            echo "selected";
                                                          } ?>>Teknik Informatika</option>
                      <option value="Sistem Informasi" <?php if ($row['program_studi'] == "Sistem Informasi") {
                                                          echo "selected";
                                                        } ?>>Sistem Informasi</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tahun Masuk</td>
                  <td>
                    <select class="form-control" name="tahun_masuk" id="tahun_masuk" required>
                      <?php
                      for ($x = 2015; $x <= 2021; $x++) {
                      ?>
                        <option value=<?= $x ?> <?php if ($row['tahun_masuk'] == $x) {
                                                  echo "selected";
                                                } ?>><?= $x ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>