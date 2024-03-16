<?php

require '../function.php';

$keyword = $_GET['keyword'];
$data = getData($keyword);

?>


<div class="overflow-auto h-[200px] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 pl-8">
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
            <a href="detail.php?id=<?= $d['id']; ?>" class="detailMahasiswa" value="<?= $d['mahasiswa_id']; ?>"><?= $d['nama']; ?></a>
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