<?php
require 'function.php';
$mahasiswa = getMahasiswa();

$id = $_GET['id'];
$nilai = getDetailNilai($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Nilai</title>
</head>

<body>
  <h2 class="font-bold">
    Ubah Nilai
  </h2>
  <form action="" method="post" class="flex flex-col gap-2" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo $nilai['id']; ?>">
    <label for="mahasiswa_id" class="text-md">Pilih Mahasiswa</label>
    <select name="mahasiswa_id" id="mahasiswa_id" class="p-2 border border-gray-300 rounded-md">
      <?php foreach ($mahasiswa as $mhs) : ?>
        <option value="<?php echo $mhs['id']; ?>" <?php echo $mhs['id'] == $nilai['mahasiswa_id'] ? 'selected' : ''; ?>><?php echo $mhs['nama']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="matkul" class="text-md">Mata Kuliah</label>
    <input type="text" name="matkul" id="matkul" class="p-2 border border-gray-300 rounded-md" value="<?php echo $nilai['matkul']; ?>">

    <label for="nilai" class="text-md">Nilai</label>
    <input type="text" name="nilai" id="nilai" class="p-2 border border-gray-300 rounded-md" value="<?php echo $nilai['nilai']; ?>">

    <button type="submit" name="submit" class="p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Ubah</button>
  </form>
</body>

</html>