<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$mahasiswa = mysqli_query($connection, "SELECT nim,nama FROM mahasiswa");
$matkul = mysqli_query($connection, "SELECT kode_matkul,nama_matkul FROM matakuliah");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Nilai</h1>
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
                <td>Nama Mahasiswa</td>
                <td>
                  <select class="form-control" name="nim" id="nim" required>
                    <option value="">--Pilih Mahasiswa--</option>
                    <?php
                    while ($r = mysqli_fetch_array($mahasiswa)) :
                    ?>
                      <option value="<?= $r['nim'] ?>"><?= $r['nama'] ?></option>
                    <?php
                    endwhile;
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Mata Kuliah</td>
                <td>
                  <select class="form-control" name="matkul" id="matkul" required>
                    <option value="">--Pilih Matakuliah--</option>
                    <?php
                    while ($r = mysqli_fetch_array($matkul)) :
                    ?>
                      <option value="<?= $r['kode_matkul'] ?>"><?= $r['nama_matkul'] ?></option>
                    <?php
                    endwhile;
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Semester</td>
                <td>
                  <select class="form-control" name="semester" id="semester" required>
                    <option value="">--Pilih Semester--</option>
                    <?php
                    for ($x = 1; $x <= 12; $x++) {
                    ?>
                      <option value=<?= $x ?>><?= $x ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Nilai</td>
                <td><input class="form-control" type="number" name="nilai" max="100"></td>
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