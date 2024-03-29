<?php
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
  </div>
  <div >
    <form action="" method="POST" enctype="multipart/form-data"  class="flex flex-col gap-2">
      <input type="hidden" name="type" value="mahasiswa">
      <label for="nama" class="text-md">Nama :</label>
      <input type="text" name="nama" id="nama" class="p-2 border border-gray-300 rounded-md">

      <label for="nrp" class="text-md">NRP :</label>
      <input type="text" name="nrp" id="nrp" class="p-2 border border-gray-300 rounded-md">

      <label for="email" class="text-md">Email :</label>
      <input type="email" name="email" id="email" class="p-2 border border-gray-300 rounded-md">

      <label for="jurusan" class="text-md">Jurusan :</label>
      <input type="text" name="jurusan" id="jurusan" class="p-2 border border-gray-300 rounded-md">

      <label for="gambar" class="text-md">Gambar :</label>
      <input type="file" name="gambar" id="gambar" accept="image/*">
      <img id="preview" src="#" alt="Preview Image" style="display: none; max-width: 200px; max-height: 200px;">

      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2" name="submit">
        Tambah Mahasiswa
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
</script>

</html>