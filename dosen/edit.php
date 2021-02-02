<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nidn = $_GET['nidn'];
$query = mysqli_query($connection, "SELECT * FROM dosen WHERE nidn='$nidn'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Dosen</h1>
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
              <input type="hidden" name="nidn" value="<?= $row['nidn'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>NIDN</td>
                  <td><input class="form-control" type="number" name="nidn" size="20" required value="<?= $row['nidn'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Dosen</td>
                  <td><input class="form-control" type="text" name="nama" size="20" required value="<?= $row['nama_dosen'] ?>"></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>
                    <select class="form-control" name="jenkel" id="jenkel" required>
                      <option value="Pria" <?php if ($row['jenkel_dosen'] == "Pria") {
                                              echo "selected";
                                            } ?>>Pria</option>
                      <option value="Wanita" <?php if ($row['jenkel_dosen'] == "Wanita") {
                                                echo "selected";
                                              } ?>>Wanita</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td colspan="3"><textarea class="form-control" name="alamat" id="alamat" required><?= $row['alamat_dosen'] ?></textarea></td>
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