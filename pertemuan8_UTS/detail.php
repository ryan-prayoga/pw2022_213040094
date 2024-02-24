<?php
require 'function.php';

$id = $_GET['id'];
$nilai = getDetailMahasiswa($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <div class="flex justify-between items-center mb-4">
    <h2>
      Detail Mahasiswa
    </h2>
    <div id="kembali" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Kembali</div>
  </div>
  <div class="flex flex-col gap-2">
    <label for="nama" class="text-md">Nama :</label>
    <div id="nama" class="font-semibold"><?= $nilai['nama']; ?></div>

    <label for="nim" class="text-md">NRP :</label>
    <div id="nim" class="font-semibold"><?= $nilai['nrp']; ?></div>

    <label for="email" class="text-md">Email :</label>
    <div id="email" class="font-semibold"><?= $nilai['email']; ?></div>

    <label for="jurusan" class="text-md">Jurusan :</label>
    <div id="jurusan" class="font-semibold"><?= $nilai['jurusan']; ?></div>
</body>

<script>
  $(document).ready(function() {
    $('#kembali').click(function() {
      $('#cardTiga').html(`
        <div class="flex flex-col items-center justify-center h-full">
          <div class="text-2xl">
            Pilih salah satu mahasiswa untuk melihat detail
          </div>
        </div>
      `);
    });
  });
</script>

</html>