<?php

if (isset($_POST['cari'])) {
  $data = getData($_POST['keyword']);
} else {
  $data = getData();
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Nilai</title>
</head>

<body>
  <div class="flex justify-between items-center mb-4">
    <h2 class="font-bold">
      Daftar Nilai
    </h2>
    <form action="" method="post" class="flex items-center gap-2">
      <input type="text" name="keyword" id="keyword" class="p-2 border border-gray-300 rounded-md" placeholder="Cari data Nilai..." value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : ''; ?>">
    </form>
  </div>
  <table border="1" cellpadding="10" cellspacing="0" class="w-full">
    <thead class="border-b-2 border-gray-400 border rounded-lg">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Matkul</th>
        <th>Nilai</th>
        <th>Aksi</th>
      </tr>
    </thead>
  </table>
  <div class="overflow-auto h-[200px] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 pl-8" id="daftarNilai">
    <table border="1" cellpadding="10" cellspacing="0" class="w-full">
      <tbody>
        <?php if (empty($data)) : ?>
          <tr>
            <td colspan="5" class="text-center">Data tidak ditemukan</td>
          </tr>
        <?php endif; ?>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td>
              <?= $d['nama']; ?>
            </td>
            <td class="text-center pl-10"><?= $d['matkul']; ?></td>
            <td class="text-center pl-12"><?= $d['nilai']; ?></td>
            <td class="text-end">
              <a href="index.php" class="p-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 ubahNilai" value="<?= $d['id']; ?>">Ubah</a>
              <a href="hapus.php?id=<?= $d['id']; ?>" class="p-2 bg-red-500 text-white rounded-md hover:bg-red-600 hapusNilai" value="<?= $d['id']; ?>">Hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

<script>
  $(document).ready(function() {
    //  ketika keyword ditulis 
    $('#keyword').on('keyup', function() {
      //  ambil isi dari keyword
      $keyword = $(this).val();
      //  kirim data keyword ke ajax_cari.php
      $('#daftarNilai').load('ajax/ajax_cari_nilai.php?keyword=' + $keyword);
    });

    $('.ubahNilai').click(function(event) {
      event.preventDefault();
      $id = $(this).attr('value');
      $('#cardTiga').load('ubah.php?id=' + $id);
    });

    $('.hapusNilai').click(function(event) {
      event.preventDefault();
      $id = $(this).attr('value');
      if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        $('#cardTiga').load('hapus.php?id=' + $id);
      }
    });
  });
</script>

</html>

<style>
  .scrollbar-thin::-webkit-scrollbar {
    width: 12px;
  }

  .scrollbar-thumb-gray-300::-webkit-scrollbar-thumb {
    background-color: #d4d4d4;
    border-radius: 6px;
  }

  .scrollbar-track-gray-100::-webkit-scrollbar-track {
    background-color: #f1f1f1;
  }
</style>