<?php
require 'function.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
              alert('Data Berhasil Ditambahkan!');
              document.location.href = 'index.php';
            </script>";
  } else {
    echo "Data Gagal Ditambahkan!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Mahasiswa</title>
</head>

<body>
  <h1>
    Tambah Data Mahasiswa
  </h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required>
      </li>
      <li>
        <label for="nrp">NRP :</label>
        <input type="text" name="nrp" id="nrp" required>
      </li>
      <li>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" required>
      </li>
      <li>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required>
      </li>
      <li>
        <label for="gambar">Gambar :</label>
        <input type="text" name="gambar" id="gambar" required>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>