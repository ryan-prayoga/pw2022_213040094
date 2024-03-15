<?php
require 'function.php';

session_start();

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <button><a href="logout.php">Logout</a></button>

  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="40" placeholder="masukkan keyword pencarian.." autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>
  <br>

  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($mahasiswa)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style: italic;">data mahasiswa tidak ditemukan!</p>
          </td>
        </tr>
      <?php endif; ?>
      <?php $i = 1; ?>
      <?php foreach ($mahasiswa as $mhs) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><img src="img/<?= $mhs['gambar']; ?>" width="60"></td>
          <td><?= $mhs['nama']; ?></td>
          <td>
            <a href="detail.php?id=<?= $mhs['id']; ?>">lihat detail</a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>