<?php

require '../function.php';

$keyword = $_GET['keyword'];
$mahasiswa = cari($keyword);
?>

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