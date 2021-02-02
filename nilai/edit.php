<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM nilai WHERE id='$id'");
$mahasiswa = mysqli_query($connection, "SELECT nim,nama FROM mahasiswa");
$matkul = mysqli_query($connection, "SELECT kode_matkul,nama_matkul FROM matakuliah");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Nilai</h1>
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
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Nama Mahasiswa</td>
                  <td>
                    <select class="form-control" name="nim" id="nim" required>
                      <?php
                      while ($r = mysqli_fetch_array($mahasiswa)) :
                      ?>
                        <option value="<?= $r['nim'] ?>" <?php if ($row['nim'] == $r['nim']) {
                                                              echo "selected";
                                                            } ?>><?= $r['nama'] ?></option>
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
                      <?php
                      while ($r = mysqli_fetch_array($matkul)) :
                      ?>
                        <option value="<?= $r['kode_matkul'] ?>" <?php if ($row['kode_matkul'] == $r['kode_matkul']) {
                                                                      echo "selected";
                                                                    } ?>><?= $r['nama_matkul'] ?></option>
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
                      <?php
                      for ($x = 1; $x <= 12; $x++) {
                      ?>
                        <option value="<?= $x ?>" <?php if ($row['semester'] == $x) {
                                                                      echo "selected";
                                                                    } ?>><?= $x ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nilai</td>
                  <td><input class="form-control" type="number" name="nilai" max="100" value="<?= $row['nilai'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  </td>
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