<?php
require 'function.php';
if (isset($_POST['submit'])) {
  if (isset($_POST['id'])) {
    if (ubah($_POST) > 0) {
      echo "<script>
              document.location.href = 'index.php';
          </script>";
    } else {
      echo "<script>
              document.location.href = 'index.php';
          </script>";
    }
  } else {
    if (tambah($_POST) > 0) {
      echo "<script>
              document.location.href = 'index.php';
          </script>";
    } else {
      echo "<script>
              document.location.href = 'index.php';
          </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UTS</title>
  <script src="https://cdn.tailwindcss.com"> </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS</title>
    <script src="https://cdn.tailwindcss.com"></script>

  </head>

<body class="bg-gray-200 p-10">
  <h1 class="text-4xl text-center mt-10">UTS Pemrograman Web</h1>

  <div class="mx-auto mt-10">
    <h3 class="text-2xl mt-10">
      Soal
    </h3>
    <div>
      Buat aplikasi untuk menyimpan, mengubah, dan menghapus data di database (cukup 1 tabel). Submit laporan penjelasan kode dan penjelasan cara penggunaan aplikasi.
    </div>
    <h3 class="text-2xl mt-10">
      Jawaban
    </h3>
    <ul>
      <li>
        Nama : Ryan Prayoga
      </li>
      <li>
        NRP : 213040094
      </li>
    </ul>
    <div class="items-center flex gap-4 mt-4">
      <div class="border border-gray-400 rounded-lg h-[350px] w-full p-4 basis-1/4" id="cardSatu">
        <?php include 'tambah.php'; ?>
      </div>
      <div class="border border-gray-400 rounded-lg h-[350px] w-full p-4 basis-1/2 overflow-hidden" id="cardDua">
        <?php include 'daftar.php'; ?>
      </div>
      <div class="border border-gray-400 rounded-lg h-[350px] w-full p-4 basis-1/4" id="cardTiga">
        <div class="flex flex-col items-center justify-center h-full">
          <div class="text-2xl">
            Pilih salah satu mahasiswa untuk melihat detail
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>