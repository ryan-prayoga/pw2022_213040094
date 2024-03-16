<?php
require 'function.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Mahasiswa</title>
</head>

<body>
  <div class="flex justify-between items-center mb-4">
    <h2>
      Tambah Mahasiswa
    </h2>
    <div id="kembali" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Kembali</div>
  </div>
  <div class="flex flex-col gap-2">
    <form action="process.php" method="POST" enctype="multipart/form-data">
      <label for="nama" class="text-md">Nama :</label>
      <input type="text" name="nama" id="nama" class="font-semibold" value="<?= $nilai['nama']; ?>">

      <label for="nim" class="text-md">NRP :</label>
      <input type="text" name="nim" id="nim" class="font-semibold" value="<?= $nilai['nrp']; ?>">

      <label for="email" class="text-md">Email :</label>
      <input type="email" name="email" id="email" class="font-semibold" value="<?= $nilai['email']; ?>">

      <label for="jurusan" class="text-md">Jurusan :</label>
      <input type="text" name="jurusan" id="jurusan" class="font-semibold" value="<?= $nilai['jurusan']; ?>">

      <label for="gambar" class="text-md">Gambar :</label>
      <input type="file" name="gambar" id="gambar" accept="image/*">
      <img id="preview" src="#" alt="Preview Image" style="display: none; max-width: 200px; max-height: 200px;">

      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
        Submit
      </button>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('#gambar').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#preview').attr('src', e.target.result);
          $('#preview').show();
        }
        reader.readAsDataURL(this.files[0]);
      });
    });
  </script>
</body>

<script>
  $(document).ready(function() {
    $('#kembali').click(function() {
      $('#cardTiga').html(`
      <div class="flex flex-col items-center justify-center h-full">
          <div class="text-2xl">
            Pilih salah satu mahasiswa untuk melihat detail
          </div>
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
            Tambah Mahasiswa
          </button>
        </div>
      `);
    });
  });
</script>

</html>