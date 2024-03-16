<?php

if (isset($_POST['cari_mahasiswa'])) {
  $data = getMahasiswa($_POST['keyword_mahasiswa']);
} else {
  $data = getMahasiswa();
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <div class="flex justify-between items-center mb-4">
    <h2 class="font-bold">
      Daftar Mahasiswa
    </h2>
    <form action="" method="post" class="flex items-center gap-2">
      <input type="text" name="keyword_mahasiswa" id="keyword_mahasiswa" class="p-2 border border-gray-300 rounded-md" placeholder="Cari data Mahasiswa..." value="<?= isset($_POST['keyword_mahasiswa']) ? $_POST['keyword_mahasiswa'] : ''; ?>">
    </form>
  </div>
  <table border="1" cellpadding="10" cellspacing="0" class="w-full">
    <thead class="border-b-2 border-gray-400 border rounded-lg">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Aksi</th>
      </tr>
    </thead>
  </table> 
  <div class="overflow-auto h-[400px] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 pl-8" id="daftarMahasiswa">
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
            <td class="text-center text-blue-500">
              <a href="detail_mahasiswa.php?id=<?= $d['id']; ?>" class="detailMahasiswa" value="<?= $d['id']; ?>"><?= $d['nama']; ?></a>
            </td>
            <td class="text-center pl-12"><?= $d['jurusan']; ?></td>
            <td class="text-end">
              <a href="index.php" class="p-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 ubahMahasiswa" value="<?= $d['id']; ?>">Ubah</a>
              <a href="hapus.php?id=<?= $d['id']; ?>" class="p-2 bg-red-500 text-white rounded-md hover:bg-red-600 hapusMahasiswa" value="<?= $d['id']; ?>">Hapus</a>
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
    $('#keyword_mahasiswa').keyup(function() {
      $('#daftarMahasiswa').load('ajax/ajax_cari_mahasiswa.php?keyword_mahasiswa=' + $('#keyword_mahasiswa').val());
    });

    $('.detailMahasiswa').click(function(event) {
      event.preventDefault();
      $id = $(this).attr('value');
      $('#cardTiga_mahasiswa').load('detail.php?id=' + $id);
    });

    $('.ubahMahasiswa').click(function(event) {
      event.preventDefault();
      $id = $(this).attr('value');
      $('#cardTiga_mahasiswa').load('ubah_mahasiswa.php?id=' + $id);
    });

    $('.hapusMahasiswa').click(function(event) {
      event.preventDefault();
      $id = $(this).attr('value');
      if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        $('#cardTiga_mahasiswa').load('hapus_mahasiswa.php?id=' + $id);
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