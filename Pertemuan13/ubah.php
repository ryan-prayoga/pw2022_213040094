<?php
require 'function.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'index.php';
            </script>";
  } else {
    echo "<script>
                alert('Data Gagal Diubah!');
                document.location.href = 'index.php';
            </script>";
  };
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Mahasiswa</title>
</head>

<body>
  <h1>
    Ubah Data Mahasiswa
  </h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
    <ul>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
      </li>
      <li>
        <label for="nrp">NRP :</label>
        <input type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
      </li>
      <li>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required value="<?= $mhs['email']; ?>">
      </li>
      <li>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
      </li>
      <li>
        <input type="hidden" name="gambar_lama" value="<?= $mhs['gambar']; ?>">
        <label for="gambar">Gambar :</label>
        <input type="file" name="gambar" id="gambar" class="gambar" onchange="previewImage()">
        <img src="img/<?= $mhs['gambar']; ?>" width="120" style="display: block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>

  <script src="JS/script.js"></script>
</body>

</html>